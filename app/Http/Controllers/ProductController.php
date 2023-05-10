<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function create(){
        return view('product.create', [
            'category' => Category::all(),
            'sizes' => Size::all(),
            'colors' => Color::all()
        ]);
    }
    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // validate each image
            // 'image_id' => 'required|exists:product_images,id',
            // 'size_id' => 'nullable|exists:sizes,id',
            // 'color' => 'nullable|exists:colors,id',
        ]);

        $data = array_merge($validation, [
            'user' => auth()->user()->id
       ]);



        
        $product = Product::create($data);
        foreach ($request->file('images') as $file) {
            $path = $file->store('public/product');
            $url = Storage::url($path);
        
            ProductImages::create([
                "image" => $url,
                "product" => $product->id
            ]);
        }
        

        
        foreach($request->input('color') as $id){
            $color = Color::find($id); 
            $product->colors()->save($color);
        }
        
        return redirect()->route('product.list')->with(['message' => 'Product created successfully.']);

    }
}
