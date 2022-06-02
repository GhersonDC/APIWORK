<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructionletter', function (Blueprint $table) {
            $table->id();
            $table->string('customerId'); //customer
            $table->string('address')->nullable(); //tipo de servicio
            $table->string('rfc')->nullable(); //incoterm
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('type_service');
            $table->integer('reference')->nullable();
            $table->enum("incoterm", ['EXW', 'FCA', 'CPT', 'CIP', 'DAP', 'DPU', 'DDP', 'CFR', 'FOB', 'FAS', 'CIF']);
            $table->string('type_equipment');
            $table->integer('pickup_address');
            $table->string('pol');
            $table->string('pod');
            $table->integer('delivery_address');
            $table->string('description');
            $table->string('tariff');
            $table->string('type_packaging');
            $table->string('volume');
            $table->string('weight')->nullable();;
            $table->string('cbm');
            $table->string('quantity')->nullable();
            $table->string('lenght')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('special_description')->nullable();
            //timestamps
            $table->timestamp('createdAt')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('updatedAt')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->string('createdBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructionletter');
    }
}
