<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->float('old_price')->nullable();
            $table->integer('stock');
            $table->text('description');
            $table->text('body');
            $table->foreignIdFor(Brand::class, 'brand_id');
            $table->foreignIdFor(User::class, 'user_id');
            $table->foreignIdFor(Category::class, 'category_id'); // belongs to on category
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
