<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'cart_id', 'quantity', 'total'];



    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    protected static function booted() {
        static::created(function ($model) {
            $model->total = $model->quantity * $model->product->price;
            $model->save();
        });

    }
}
