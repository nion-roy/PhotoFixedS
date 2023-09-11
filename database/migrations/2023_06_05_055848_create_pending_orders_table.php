<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_orders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('service');
            $table->string('orderImgDir');
            $table->string('userID');
            $table->string('userEmail');
            $table->date('orderDate');
            $table->text('description');
            $table->string('paymentCode')->nullable();
            $table->string('paymentImg')->nullable();
            $table->text('userPackID')->nullable();
            $table->text('userPackName')->nullable();
            $table->text('freeOrder')->nullable();
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
        Schema::dropIfExists('pending_orders');
    }
}
