<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('avatar')->default('/avatars/avatar.png');
            $table->string('address')->nullable();
            $table->text('bio')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
           
        });

        User::create([
            'first_name' => 'mery',
            'last_name' => "shop",
            'email' => 'mery@gmail.com',
            "password" => Hash::make('mery123'),
            "token" => Str::random(40),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
