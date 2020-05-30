<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parner_name', 191);
            $table->string('name', 191)->unique();
            $table->text('description')->nullable();
            $table->timestamp('expired');
            $table->unsignedInteger('price');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('bonus_point');
            $table->string('image1', 191)->nullable();
            $table->string('image2', 191)->nullable();
            $table->string('image3', 191)->nullable();
            $table->timestamps();

            $table->foreign('parner_name')->references('name')->on('parners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
