<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopItemRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_item_requests', function (Blueprint $table) {
            $table->id();
            $table->string('userID');
            $table->string('userName');
            $table->string('itemID');
            $table->string('itemName');
            $table->integer('price');
            $table->date('date');
            $table->string('status');
            $table->string('transactionTxt');
            $table->string('transactionImg')->nullable();
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
        Schema::dropIfExists('shop_item_requests');
    }
}
