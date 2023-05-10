<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::create(['size'=> 'XS - 84 CM']);
        Size::create(['size'=> 'S - 92 CM']);
        Size::create(['size'=> 'M - 100 CM']);
        Size::create(['size'=> 'L - 108 CM']);
        Size::create(['size'=> 'XL - 116 CM']);
        Size::create(['size'=> 'XS - 124 CM']);
    }
}
