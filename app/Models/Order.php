<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'total',
        'address',
        'city',
        'country',
        'phone',
        'user_id',
        'status'
    ];

    public function details(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function getTotal(){
        $prices = $this->details->map(function ($item) {
            return $item->total;
        });
        return array_sum($prices->all());
    }
}
