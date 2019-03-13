<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        $areas = array(
            array('nombre' => 'Finanzas'),
            array('nombre' => 'Recursos humanos'),
            array('nombre' => 'Producción'),
            array('nombre' => 'Ventas'),
            array('nombre' => 'Sistemas')
        ); 

        DB::table('areas')->insert($areas);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
