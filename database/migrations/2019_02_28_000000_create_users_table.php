<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('password');
            $table->enum('tipo_cuenta', ['USUARIO', 'ADMIN'])->default('USUARIO'); // Admin system
            $table->boolean('cuenta_activa')->default(1);
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fec_nac');
            $table->enum('genero', ['MASCULINO', 'FEMENINO'])->default('MASCULINO');
            $table->enum('estado_civil', ['SOLTERO', 'CASADO'])->default('SOLTERO');
            $table->string('curp');
            $table->string('rfc')->default('XAXX010101000');
            $table->string('domicilio');
            $table->string('avatar')->default('default_avatar.png'); // Avatar system
            $table->string('cta_bancaria')->nullable();
            $table->float('salario_diario');
            $table->string('dias_descanso');
            $table->integer('id_tipocontrato')->unsigned();
            $table->integer('id_puesto')->unsigned();
            $table->integer('id_area')->unsigned();
            $table->integer('id_tiponomina')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            // Relaciones
            $table->foreign('id_puesto')->references('id')->on('puestos');

            $table->foreign('id_area')->references('id')->on('areas');

            $table->foreign('id_tiponomina')->references('id')->on('tiposnomina');

            $table->foreign('id_tipocontrato')->references('id')->on('tiposcontrato');

        });

        $shane = array(
            'password' => '$2y$10$oxy0mVSaQU/w9Vi1MVMg9ORHk2dkIwf6VTlR8YWaRszDg3lUrxxk.',
            'tipo_cuenta' => 'ADMIN',
            'nombres' => 'Shane',
            'apellidos' => 'Gibson',
            'fec_nac' => '1996-11-11',
            'genero' => 'MASCULINO',
            'estado_civil' => 'SOLTERO',
            'curp' => 'OOVC961111CURP',
            'rfc' => 'OOVC961111RFC',
            'domicilio' => 'Av. Juares 28, Centro',
            'cta_bancaria' => '4653268850',
            'salario_diario' => '511.3',
            'dias_descanso' => '2',
            'id_tipocontrato' => '1',
            'id_puesto' => '1',
            'id_area' => '1',
            'id_tiponomina' => '1'
        ); 

        DB::table('empleados')->insert($shane);

        $shane = array(
            'password' => '$2y$10$oxy0mVSaQU/w9Vi1MVMg9ORHk2dkIwf6VTlR8YWaRszDg3lUrxxk.',
            'tipo_cuenta' => 'USUARIO',
            'nombres' => 'Luis',
            'apellidos' => 'Torres',
            'fec_nac' => '1996-11-11',
            'genero' => 'MASCULINO',
            'estado_civil' => 'SOLTERO',
            'curp' => 'OOVC961111CURP',
            'rfc' => 'OOVC961111RFC',
            'domicilio' => 'Av. Juares 28, Centro',
            'cta_bancaria' => '4653268850',
            'salario_diario' => '511.3',
            'dias_descanso' => '2',
            'id_tipocontrato' => '1',
            'id_puesto' => '1',
            'id_area' => '1',
            'id_tiponomina' => '1'
        );

        DB::table('empleados')->insert($shane);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
