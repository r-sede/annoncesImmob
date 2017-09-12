<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('n_rue');
            $table->string('rue');
            $table->string('code_postal');
            $table->string('ville');
            $table->integer('superficie');
            $table->integer('fk_type_logements');
            $table->boolean('meuble');
            $table->float('tarif');
            $table->integer('fk_modalite');
            $table->integer('etage')->nullable();
            $table->integer('fk_type_parking')->nullable();
            $table->integer('n_chambre');
            $table->string('description');
            $table->string('photo')->default('default.jpg');
            $table->char('classe_energie');
            $table->char('classe_gesc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logements');
    }
}
