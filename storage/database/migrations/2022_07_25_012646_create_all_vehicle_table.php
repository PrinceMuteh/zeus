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
        Schema::create('all_vehicle', function (Blueprint $table) {
            $table->id();
            $table->string("vehno")->nullable();
            $table->string("systemno")->nullable();
            $table->string("simid")->nullable();
            $table->string("bodytypename")->nullable();
            $table->string("brandname")->nullable();
            $table->string("createtime")->nullable();
            $table->string("expirdate")->nullable();
            $table->string("investorid")->nullable();
            $table->string("investorname")->nullable();
            $table->string("investorphonenumber")->nullable();
            $table->string("investoremail")->nullable();
            $table->string("driverid")->nullable();
            $table->string("drivername")->nullable();
            $table->string("driverphone")->nullable();
            $table->string("driveremail")->nullable();
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
        Schema::dropIfExists('all_vehicle');
    }
};
