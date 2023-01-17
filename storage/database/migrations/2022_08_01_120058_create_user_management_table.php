<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_management', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->nullable();
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("password")->nullable();
            $table->string("password2")->nullable();
            $table->string("account")->nullable();
            $table->string("address")->nullable();
            $table->string("town")->nullable();
            $table->string("package")->nullable();
            $table->string("gender")->nullable();
            $table->string("acctBal")->nullable();
            $table->string("image")->nullable();
            $table->string("category")->nullable();
            $table->string("accountNumber")->nullable();
            $table->string("sortCode")->nullable();
            $table->string("driverId")->nullable();
            $table->string("transactionPin")->nullable();
            $table->string("nin")->nullable();
            $table->string("dob")->nullable();
            $table->string("refferral")->nullable();
            $table->string("defaultCar")->nullable();
            $table->string("tracking")->nullable();
            $table->string("repairFinancing")->nullable();
            $table->string("bolt")->nullable();
            $table->string("insurance")->nullable();
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
        Schema::dropIfExists('user_management');
    }
};
