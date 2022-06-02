<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {

            $table->id('clientid');
            $table->string('number')->nullable();;
            $table->string('number_old')->nullable();;
            $table->string('usuarioid')->nullable();
            $table->string('nombre');
            $table->string('rfc')->nullable();;
            $table->string('tipo')->nullable();;
            $table->string('direccion')->nullable();;
            $table->string('colonia')->nullable();;
            $table->string('ciudad')->nullable();;
            $table->string('cp')->nullable();;
            $table->string('estado')->nullable();;
            $table->string('telefono')->nullable();
            $table->string('contacto')->nullable();
            $table->string('nextel')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('zoho_accountid')->nullable();
            $table->string('tipocargaid')->nullable();
            $table->string('activo')->default('1');
            $table->string('es_proveedor')->default('0');
            $table->string('nps_promedio')->nullable();
            $table->string('ces_promedio')->nullable();
            $table->string('intervalos_revision')->default('60');
            $table->string('dias_de_credito')->default('15');
            $table->string('especificaciones')->nullable();
            $table->string('portal')->nullable();
            $table->string('portal_usuario')->nullable();
            $table->string('portal_clave')->nullable();
            $table->string('almacen')->default('1');
            $table->string('transporte')->default('1');
            $table->string('facturacion')->default('1');
            $table->string('aamex')->default('1');
            $table->string('aausa')->default('1');
            $table->string('logo')->default('images/avatar.png');
            $table->string('shelter')->default('0');
            $table->string('esporadico')->default('0');
            $table->string('homol')->nullable();;
            $table->string('envio_edo_cta')->default('0');
            $table->string('excluir_gbill')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('cliente');
    }
}
