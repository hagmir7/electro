<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function list(){
        return view('category.list', [
            'categories' => Category::paginate(12)
        ]);

    } 

    public function listAdmin(Request $request)
    {
        if (isset($request->search)) {
            $categories  = Category::where('name', 'LIKE', '%' . $request->search . '%')->paginate(30);
        } else {
            $categories  = Category::paginate(30);
        }
        return view('category.list-admin', [
            'categories' => $categories
        ]);
    } 

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:60',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // validate each image
        ]);

        $file = $request->file('image');
        $path = $file->store('public/category');
        $url = Storage::url($path);

        Category::create([
            'name' => $request->input('name'),
            'image' => $url
        ]);

        return redirect()->route('category.list.admin')->with(['message' => "Category Created successfully."]);
    }



    public function update(Category $category){
        return view('category.update', [
            'category' => $category
        ]);
    }


    public function updateStore(Request $request, Category $category){

        $data = ['name' => $request->input('name')];

        if(!empty($request->file('image'))){
            $file = $request->file('image');
            $url = Storage::url($file->store('public/category'));
            $data = array_merge($data, ['image' => $url]);
        }
        $category->update($data);
        return redirect()->route('category.list.admin')->with(['message' => "Category updated successfully."]);
    }

    public function delete(Category $category){
        $category->delete();
        return redirect()->route('category.list.admin')->with(['message' => "Category deleted successfully."]);
    }

    public function category(Category $category){
        return view('category.category', [
            "products" => Product::where('category_id', $category->id)->paginate(13),
            'category' => $category
        ]);
    }

    public function deleteMultiple(Request $request){
        $categories = $request->input('category', []);
        Category::whereIn('id', $categories)->delete();
        return response()->json(['message' => 'Les Catégories ont été supprimés avec succès!']);
        
    }
}
