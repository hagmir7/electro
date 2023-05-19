<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'total'];



    public function items(){
        return $this->hasMany(CartDetail::class, 'cart_id');
    }

    public function getTotal(){
        $prices = $this->items->map(function ($item) {
            return $item->total;
        });
        return array_sum($prices->all());
    }

}
