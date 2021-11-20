<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_surname')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_province')->nullable();
            $table->string('billing_district')->nullable();
            $table->string('billing_sub_district')->nullable();
            $table->string('billing_pincode')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('bank')->nullable();
            $table->integer('billing_subtotal');
            $table->integer('billing_deposit');
            $table->integer('billing_refund');
            $table->integer('billing_total');
            $table->string('delivery_op');
            $table->string('status')->default(1);
            $table->string('image')->default(false);
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
        Schema::dropIfExists('orders');
    }
}
