<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conso_elec_gazs', function (Blueprint $table) {
            $table->id();

            $table->string('operateur');
            $table->integer('annee');
            $table->string('filiere');
            $table->string('code_categorie_consommation');
            $table->string('libelle_categorie_consommation');
            $table->string('code_grand_secteur');
            $table->string('libelle_grand_secteur');
            $table->string('code_naf')->nullable();
            $table->string('libelle_secteur_naf2')->nullable();
            $table->unsignedDecimal('conso', 15, 4);
            $table->integer('pdl');
            $table->unsignedDecimal('indqual', 9, 5);
            $table->integer('nombre_mailles_secretisees');
            $table->string('code_region');
            $table->string('libelle_region');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conso_elec_gazs');
    }
};
