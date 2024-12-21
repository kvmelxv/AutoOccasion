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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->json('description');
            $table->date('date_arrivee');
            $table->decimal('prix_payee', 10, 2);
            $table->unsignedInteger('kilometrage');
            $table->unsignedInteger('annee');

            $table->unsignedBigInteger('modele_id');
            $table->unsignedBigInteger('motopropulseur_id');
            $table->unsignedBigInteger('carburant_id');
            $table->unsignedBigInteger('transmission_id');
            $table->unsignedBigInteger('couleur_id');

            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');
            $table->foreign('motopropulseur_id')->references('id')->on('motopropulseurs')->onDelete('cascade');
            $table->foreign('carburant_id')->references('id')->on('carburants')->onDelete('cascade');
            $table->foreign('transmission_id')->references('id')->on('transmissions')->onDelete('cascade');
            $table->foreign('couleur_id')->references('id')->on('couleurs')->onDelete('cascade');

            $table->timestamps();

            /*             ALTER TABLE voitures 
            ADD COLUMN commande_id BIGINT(20) UNSIGNED DEFAULT NULL, 
            ADD CONSTRAINT fk_constraint_cmd
            FOREIGN KEY (commande_id) 
            REFERENCES commandes(id); */

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
