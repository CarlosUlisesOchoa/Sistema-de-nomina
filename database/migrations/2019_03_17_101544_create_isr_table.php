<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isr', function (Blueprint $table) {
            $table->increments('id');
            $table->float('lim_inferior');
            $table->float('lim_superior')->nullable();
            $table->float('porcentaje');
            $table->integer('frecuencia_pago');
            $table->timestamps();
        });

        $default_values = array(
            /* SEMANALES */
            array(
                'lim_inferior' => '0.01', 
                'lim_superior' => '133.21', 
                'porcentaje' => '1.92', 
                'frecuencia_pago' => '7'
            ),
            array(
                'lim_inferior' => '133.22', 
                'lim_superior' => '1130.64', 
                'porcentaje' => '6.4', 
                'frecuencia_pago' => '7'
            ),
            array(
                'lim_inferior' => '1130.65', 
                'lim_superior' => '1987.02', 
                'porcentaje' => '10.88', 
                'frecuencia_pago' => '7'
            ),
            array(
                'lim_inferior' => '1987.03', 
                'lim_superior' => '2309.79', 
                'porcentaje' => '16', 
                'frecuencia_pago' => '7'
            ),
            array(
                'lim_inferior' => '2309.80', 
                'lim_superior' => '2765.42', 
                'porcentaje' => '17.92', 
                'frecuencia_pago' => '7'
            ),
            array(
                'lim_inferior' => '2765.43', 
                'lim_superior' => '5577.53', 
                'porcentaje' => '21.36', 
                'frecuencia_pago' => '7'
            ),
            array(
                'lim_inferior' => '5577.54', 
                'lim_superior' => '8790.95', 
                'porcentaje' => '23.52', 
                'frecuencia_pago' => '7'
            ),
            array(
                'lim_inferior' => '8790.96', 
                'lim_superior' => '16783.34', 
                'porcentaje' => '30', 
                'frecuencia_pago' => '7'
            ),
            array(
                'lim_inferior' => '16783.35', 
                'lim_superior' => '22377.74', 
                'porcentaje' => '32', 
                'frecuencia_pago' => '7'
            ),
            
            array(
                'lim_inferior' => '22377.75', 
                'lim_superior' => '67133.22', 
                'porcentaje' => '34', 
                'frecuencia_pago' => '7'
            ),
            array(
                'lim_inferior' => '67133.23', 
                'lim_superior' => null, 
                'porcentaje' => '35', 
                'frecuencia_pago' => '7'
            ),

            /* QUINCENALES */
            array(
                'lim_inferior' => '0.01', 
                'lim_superior' => '285.45', 
                'porcentaje' => '1.92', 
                'frecuencia_pago' => '15'
            ),
            array(
                'lim_inferior' => '285.46', 
                'lim_superior' => '2422.80', 
                'porcentaje' => '6.4', 
                'frecuencia_pago' => '15'
            ),
            array(
                'lim_inferior' => '2422.81', 
                'lim_superior' => '4257.90', 
                'porcentaje' => '10.88', 
                'frecuencia_pago' => '15'
            ),
            array(
                'lim_inferior' => '4257.91', 
                'lim_superior' => '4949.55', 
                'porcentaje' => '16', 
                'frecuencia_pago' => '15'
            ),
            array(
                'lim_inferior' => '4949.56', 
                'lim_superior' => '5925.90', 
                'porcentaje' => '17.92', 
                'frecuencia_pago' => '15'
            ),
            array(
                'lim_inferior' => '5925.91', 
                'lim_superior' => '11951.85', 
                'porcentaje' => '21.36', 
                'frecuencia_pago' => '15'
            ),
            array(
                'lim_inferior' => '11951.86', 
                'lim_superior' => '18837.75', 
                'porcentaje' => '23.52', 
                'frecuencia_pago' => '15'
            ),
            array(
                'lim_inferior' => '18837.76', 
                'lim_superior' => '35964.30', 
                'porcentaje' => '30', 
                'frecuencia_pago' => '15'
            ),
            array(
                'lim_inferior' => '35964.31', 
                'lim_superior' => '47952.30', 
                'porcentaje' => '32', 
                'frecuencia_pago' => '15'
            ),
            array(
                'lim_inferior' => '47952.31', 
                'lim_superior' => '143856.90', 
                'porcentaje' => '34', 
                'frecuencia_pago' => '15'
            ),
            array(
                'lim_inferior' => '143856.91', 
                'lim_superior' => null, 
                'porcentaje' => '35', 
                'frecuencia_pago' => '15'
            ),
        );

        DB::table('isr')->insert($default_values);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isr');
    }
}
