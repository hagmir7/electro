<?php

namespace App\Http\Controllers;

use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductImagesController extends Controller
{
    public function list(){
        $images = ProductImages::pagination(30);
        return view('images', [
            'image' => $images
        ]);
    }


    public function delete(ProductImages $image){
        $image->delete();
        return redirect()->back()->with(['message' => "Image Deleted successfully"]);
    }
}
