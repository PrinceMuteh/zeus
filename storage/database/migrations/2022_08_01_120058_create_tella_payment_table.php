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
        Schema::create('tella_payment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->nullable();
             $table->string("agentId")->nullable();
             $table->string("agentName")->nullable();
             $table->string("agentEmail")->nullable();
             $table->string("agentPhone")->nullable();
             $table->string("driverName")->nullable();
             $table->string("driverPhone")->nullable();
             $table->string("driverEmail")->nullable();
             $table->string("ownerName")->nullable();
             $table->string("ownerEmail")->nullable();
             $table->string("ownerPhone")->nullable();
             $table->string("vehiclePlateNo")->nullable();
             $table->string("amount")->nullable();
             $table->string("status")->nullable();
             $table->string("note")->nullable();
             $table->string("receiptImage")->nullable();
             $table->string("paymentMethod")->nullable();
             $table->string("reference")->nullable();
             $table->string("year")->nullable();
             $table->string("month")->nullable();
             $table->string("week")->nullable();
             $table->string("day")->nullable();
             $table->string("investorName")->nullable();
             $table->string("acctNumber")->nullable();
             $table->string("sortCode")->nullable();
             $table->string("debitAccount")->nullable();
             $table->string("vehicle")->nullable();
             $table->string("percentage")->nullable();
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
        Schema::dropIfExists('tella_payment');
    }
};
