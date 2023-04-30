<?php

use App\Models\Client;
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
        Schema::create('contrat_e_s', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->string('tournee');
            $table->string('tarif');
            $table->timestamps();
            $table->foreignIdFor(Client::class, 'client_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrat_e_s');
    }
};
