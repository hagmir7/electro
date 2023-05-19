<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'old_price', 'description', 'body', 'user_id', 'stock', 'category_id', 'brand_id', 
    ];  




    public function images(){
        return $this->hasMany(ProductImages::class, 'product');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

}
