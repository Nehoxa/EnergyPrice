<?php

use App\Models\FuelType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_prices', function (Blueprint $table) {
            $table->id();

            $table->integer('pump')->nullable();
            $table->integer('cp')->nullable();
            $table->string('pop')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->text('horaires')->nullable();
            $table->string('geom')->nullable();
            $table->dateTime('prix_maj')->nullable();
            $table->foreignIdFor(FuelType::class)->constrained()->nullable();
            $table->unsignedDecimal('prix_valeur', 5, 3)->nullable();
            $table->string('com_arm_code')->nullable();
            $table->string('com_arm_name')->nullable();
            $table->integer('epci_code')->nullable();
            $table->string('epci_name')->nullable();
            $table->string('dep_code')->nullable();
            $table->string('dep_name')->nullable();
            $table->string('reg_code')->nullable();
            $table->string('reg_name')->nullable();
            $table->string('com_code')->nullable();
            $table->string('com_name')->nullable();
            $table->text('services_service')->nullable();
            $table->string('horaires_automate_24_24')->nullable();

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
        Schema::dropIfExists('fuel_prices');
    }
};
