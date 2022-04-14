<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_line', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total_price', 8, 2);
            $table->integer('id_cart')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('quantity');
            $table->date('add_date');
            
            //vincoli di chiave esterna
            $table->foreign('id_cart')->references('id')->on('cart');
            $table->foreign('id_product')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartline');
    }
}
