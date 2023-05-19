<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function list(){
        return view('brand.list', [
            'brands' => Brand::paginate(12)
        ]);

    } 

    public function listAdmin(){
        return view('brand.list-admin', [
            'brands' => Brand::paginate(12)
        ]);

    } 


    public function create(){
        return view('brand.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:60',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // validate each image
        ]);

        $file = $request->file('image');
        $path = $file->store('public/brand');
        $url = Storage::url($path);

        Brand::create([
            'name' => $request->input('name'),
            'image' => $url
        ]);

        return redirect()->route('brand.list.admin')->with(['message' => "Brand Created successfully."]);
    }



    public function update(Brand $brand){
        return view('brand.update', [
            'brand' => $brand
        ]);
    }


    public function updateStore(Request $request, Brand $brand){

        $data = ['name' => $request->input('name')];

        if(!empty($request->file('image'))){
            $file = $request->file('image');
            $url = Storage::url($file->store('public/brand'));
            $data = array_merge($data, ['image' => $url]);
        }
        $brand->update($data);
        return redirect()->route('brand.list.admin')->with(['message' => "Brand updated successfully."]);
    }

    public function delete(Brand $brand){
        $brand->delete();
        return redirect()->route('brand.list.admin')->with(['message' => "Brand deleted successfully."]);
    }

    public function brand(Brand $brand){
        return view('brand.brand', [
            "products" => Product::where('brand_id', $brand->id)->paginate(13),
            'brand' => $brand
        ]);
    }
}
