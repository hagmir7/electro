<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(["name" => "Clothing and Fashion", "image" => '/product/image-1.png']);
        Category::create(["name" => "Electronics and Gadgets", "image" => '/product/image-2.png']);
        Category::create(["name" => "Home and Garden", "image" => '/product/image-3.png']);
        Category::create(["name" => "Health and Beauty", "image" => '/product/image-4.png']);
        Category::create(["name" => "Sports and Fitness", "image" => '/product/image-5.png']);
        Category::create(["name" => "Toys and Games", "image" => '/product/image-6.png']);
        Category::create(["name" => "Books and Media", "image" => '/product/image-7.png']);

    }
}
