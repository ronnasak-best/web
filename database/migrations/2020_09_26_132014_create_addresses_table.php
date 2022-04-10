<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->string('province');
            $table->string('district');
            $table->string('sub_district');
            $table->string('pincode');
            $table->boolean('default_address')->default(0);
            $table->string('mobile');
            $table->string('txtBank');
            $table->string('account_name');
            $table->string('account_no');
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
        Schema::dropIfExists('addresses');
    }
}
