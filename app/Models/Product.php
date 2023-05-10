<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'old_price', 'description', 'user', 'color', 'category',
        'stock' 
    ];  


    public function colors(){
        return $this->hasMany(Color::class, 'color');
    }

    public function sizes(){
        return $this->hasMany(Size::class, 'size');
    }

    public function images(){
        return $this->hasMany(ProductImages::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
