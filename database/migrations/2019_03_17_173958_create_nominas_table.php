<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->date('inicio_periodo');
            $table->date('fin_periodo');
            $table->float('monto_sueldo');
            $table->integer('dias_trabajados');
            $table->integer('dias_faltas');
            $table->float('monto_faltas')->nullable();
            $table->integer('dias_vacaciones')->nullable();
            $table->float('monto_vacaciones')->nullable();
            $table->float('monto_primavacacional')->nullable();
            $table->integer('dias_aguinaldo')->nullable();
            $table->float('monto_aguinaldo')->nullable();
            $table->float('monto_utilidades')->nullable();
            $table->float('monto_isr');
            $table->float('monto_imss');
            $table->float('monto_cuotasindical');
            $table->float('monto_percepciones');
            $table->float('monto_deducciones');
            $table->float('monto_totalpago');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominas');
    }
}
