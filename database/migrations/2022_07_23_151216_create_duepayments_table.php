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
        Schema::create('DuePayments', function (Blueprint $table) {
            $table->id();
            $table->string("investorname")->nullable();
            $table->string("investoremail")->nullable();
            $table->string("investorphone")->nullable();
            $table->string("drivername")->nullable();
            $table->string("driveremail")->nullable();
            $table->string("driverphone")->nullable();

            $table->string("vehid")->nullable();
            $table->string("vehno")->nullable();
            $table->string("systemno")->nullable();
            $table->string("simid")->nullable();

            $table->string("imei")->nullable();
            $table->string("enginecapacityid")->nullable();
            $table->string("enginecapacityname")->nullable();

            $table->string("fueltypeid")->nullable();
            $table->string("fueltypename")->nullable();
            $table->string("bodytypeid")->nullable();

            $table->string("bodytypename")->nullable();
            $table->string("brandid")->nullable();
            $table->string("brandname")->nullable();

            $table->string("colorid")->nullable();
            $table->string("colorname")->nullable();
            $table->string("price")->nullable();

            $table->string("status")->nullable();

            $table->dateTime("v_createtime")->nullable();
            $table->string("expirdate")->nullable();

            $table->string("investorid")->nullable();

            $table->string("orderid")->nullable();

            $table->double("needpayment")->nullable();
            $table->double("rentalprice")->nullable();
            $table->double("outstanding")->nullable();

             $table->dateTime("duetime")->nullable();
            $table->dateTime("createtime")->nullable();

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
        Schema::dropIfExists('DuePayments');
    }
};
