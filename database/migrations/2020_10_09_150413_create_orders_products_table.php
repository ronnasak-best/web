<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id')->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->string('startDate');
            $table->string('endDate');
            $table->string('size');
            $table->integer('quantity')->unsigned();
            $table->integer('status')->default(1);
            $table->string('image')->default(false);
            $table->integer('late');
            $table->integer('other_fine');
            $table->string('fine_detail');
            $table->string('tracking_no');
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
        Schema::dropIfExists('orders_products');
    }
}
