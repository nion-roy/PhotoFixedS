<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_orders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('service');
            $table->string('editedImgDir');
            $table->string('uneditedImgDir');
            $table->string('prevOrderID');
            $table->string('userID');
            $table->string('userEmail');
            $table->string('editorID');
            $table->string('editorEmail');
            $table->date('completedDate');
            $table->string('packID');
            $table->string('packName');
            $table->string('approval')->nullable();
            $table->integer('payment')->nullable();
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
        Schema::dropIfExists('completed_orders');
    }
}
