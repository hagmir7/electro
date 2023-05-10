<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create(["name" => "Red", "code" => "#FE2F02"]);
        Color::create(["name" => "Blue", "code" => "#0000FF"]);
        Color::create(["name" => "Purple", "code" => "#800080"]);
        Color::create(["name" => "Yellow", "code" => "#FFFF00"]);
        Color::create(["name" => "Pink", "code" => "#FFC0CB"]);
        Color::create(["name" => "White", "code" => "#FFFFFF"]);
        Color::create(["name" => "Black", "code" => "#000000"]);
        Color::create(["name" => "Orange", "code" => "#FFA500"]);
        Color::create(["name" => "Brown", "code" => "#A52A2A"]);
        Color::create(["name" => "Green", "code" => "#008000"]);
        Color::create(["name" => "Grey - Gray", "code" => "#808080"]);

    }
}
