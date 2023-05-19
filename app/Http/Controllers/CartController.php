<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function list(){
        return view('cart.list', [
            'carts' => Cart::where('user_id', Auth::user()->id)->first()->items
        ]);
    }

    //  Delete cart itmes
    public function delete(CartDetail $cartDetail){
        $cartDetail->delete();
        return redirect()->route('cart.list')->with(["message" => "Produit supprimé avec succès"]);
    }
}
