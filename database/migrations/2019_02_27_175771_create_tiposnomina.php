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
            $table->integer('num_dias');
            $table->timestamps();
        });

        $tiposn = array(
            array('nombre' => 'Quincenal', 'num_dias' => 15),
            array('nombre' => 'Diaria', 'num_dias' => 1),
            array('nombre' => 'Semanal', 'num_dias' => 7),
            array('nombre' => 'Catorcena', 'num_dias' => 14),
            array('nombre' => 'Mensual', 'num_dias' => 31),
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

