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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('prix_total');
            $table->unsignedBigInteger('paiement_modes_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('statut_id');
            $table->unsignedBigInteger('expedition_id');

            $table->foreign('paiement_modes_id')->references('id')->on('paiement_modes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('statut_id')->references('id')->on('statuts')->onDelete('cascade');
            $table->foreign('expedition_id')->references('id')->on('expeditions')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
