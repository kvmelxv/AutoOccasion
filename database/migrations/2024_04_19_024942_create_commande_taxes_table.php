<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commande_taxes', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->unsignedBigInteger('taxe_id');
            $table->unsignedBigInteger('commande_id');
            $table->decimal('taux');

            $table->foreign('taxe_id')->references('id')->on('taxes')->onDelete('cascade');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_taxes');
    }
};
