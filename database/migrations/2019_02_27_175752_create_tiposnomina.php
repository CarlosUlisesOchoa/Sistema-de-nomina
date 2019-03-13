<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposnomina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiposnomina', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        $tiposn = array(
            array('nombre' => 'Quincenal'),
            array('nombre' => 'Diaria'),
            array('nombre' => 'Semanal'),
            array('nombre' => 'Catorcena'),
            array('nombre' => 'Mensual')
        ); 

        DB::table('tiposnomina')->insert($tiposn);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiposnomina');
    }
}

