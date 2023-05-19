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
        Category::create(["name" => "PC portables", "image" => '/fake/category/laptop.png']);
        Category::create(["name" => "Smartphones", "image" => '/fake/category/phone.png']);
        Category::create(["name" => "Tablets", "image" => '/fake/category/tablet.png']);
        Category::create(["name" => "Claviers", "image" => '/fake/category/keyboard.png']);
        Category::create(["name" => "Appareils photo", "image" => '/fake/category/camera.png']);
        Category::create(["name" => "Moniteurs", "image" => '/fake/category/monitor.png']);
        Category::create(["name" => "Imprimantes", "image" => '/fake/category/printer.png']);


        // Laptops
        // Smartphones
        // Tablets
        // Keyboards
        // Mice (Computer mice)
        // Monitors
        // Printers
        // Headphones
        // Speakers
        // Cameras (Digital cameras)
        // Smartwatches
        // Gaming Consoles
        // Televisions
        // Projectors

    }
}
