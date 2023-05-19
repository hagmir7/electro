<?php

namespace Database\Seeders;

use App\Models\ProductImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductImages::create(['image' => "/fake/product/image-1.png", 'product' => 1 ]);
        ProductImages::create(['image' => "/fake/product/image-2.png", 'product' => 1 ]);
        ProductImages::create(['image' => "/fake/product/image-3.png", 'product' => 2 ]);
        ProductImages::create(['image' => "/fake/product/image-4.png", 'product' => 2 ]);
        ProductImages::create(['image' => "/fake/product/image-5.png", 'product' => 3 ]);
        ProductImages::create(['image' => "/fake/product/image-6.png", 'product' => 3 ]);
        ProductImages::create(['image' => "/fake/product/image-7.png", 'product' => 4 ]);
        ProductImages::create(['image' => "/fake/product/image-8.png", 'product' => 4 ]);
        ProductImages::create(['image' => "/fake/product/image-9.png", 'product' => 5 ]);
        ProductImages::create(['image' => "/fake/product/image-10.png", 'product' => 5 ]);
        ProductImages::create(['image' => "/fake/product/image-11.png", 'product' => 6 ]);
        ProductImages::create(['image' => "/fake/product/image-12.png", 'product' => 6 ]);
        ProductImages::create(['image' => "/fake/product/image-13.png", 'product' => 7 ]);
        ProductImages::create(['image' => "/fake/product/image-14.png", 'product' => 7 ]);
    }
}
