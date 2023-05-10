<?php

use App\Models\Category;
use App\Models\Color;
use App\Models\ProductImages;
use App\Models\Size;
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
            $table->boolean('status')->default(true);
            $table->foreignIdFor(User::class, 'user');
            $table->foreignIdFor(Category::class, 'category'); // belongs to on category
            $table->foreignIdFor(Size::class, 'size')->nullable(); // has many Sizes
            $table->foreignIdFor(Color::class, 'color')->nullable();
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
