<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartDetailController extends Controller
{


    public function create(Request $request){
        $user = Auth::user();

        if(!$user->cart){
            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'total' => 0
            ]);

            CartDetail::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product,
                'quantity' => $request->qty
            ]);
            return response()->json([
                'items' => $cart->items->count(),
                'btn' => "إضافة للسلة"
            ]);
        }

        $cart = $user->cart;
        $orderDetail = CartDetail::where('product_id', $request->product)->where('cart_id', $cart->id);
        if(count($orderDetail->get()) > 0){
            $orderDetail->delete();
            return response()->json([
                'items' => $cart->items->count(),
                'btn' => "إضافة للسلة"
            ]);
        }

        CartDetail::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product,
            'quantity' => $request->qty,
        ]);

        return response()->json([
            'items' => $cart->items->count(),
            'btn' => 'إزالة من السلة'
        ]);


    }
}
