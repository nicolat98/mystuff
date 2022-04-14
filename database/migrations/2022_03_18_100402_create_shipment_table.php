<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_cart')->unsigned();
            $table->string('user_name');
            $table->string('user_surname');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->integer('CAP')->unsigned();
            $table->date('shipment_date')->nullable();
            $table->bigInteger('telephone_number')->unsigned();
            $table->integer('status')->unsigned();
            
            //vincoli di chiave esterna
            $table->foreign('id_cart')->references('id')->on('cart');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment');
    }
}
