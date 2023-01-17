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
        Schema::create('vehicle_status', function (Blueprint $table) {
            $table->id();
            $table->string("systemno")->unique()->nullable();
            $table->string("vehno")->nullable();
            $table->string("time")->nullable();
            $table->string("longitude")->nullable();
            $table->string("latitude")->nullable();
            $table->string("velocity")->nullable();
            $table->string("Dtstatus")->nullable();
            $table->string("locate")->nullable();
            $table->bigInteger("miles")->nullable();
            $table->bigInteger("rate")->nullable();
            $table->string("fleet")->nullable();
            $table->string("createtime")->nullable();
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
        Schema::dropIfExists('vehicle_status');
    }
};
