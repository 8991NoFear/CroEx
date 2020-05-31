<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParnerUserTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parner_user_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('parner_id');
            $table->unsignedBigInteger('parner_user_id');
            $table->unsignedInteger('type');
            $table->unsignedInteger('point');
            $table->unsignedInteger('discount');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('parner_id')->references('id')->on('parners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parner_user_transactions');
    }
}
