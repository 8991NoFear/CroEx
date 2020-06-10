<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191)->unique();
            $table->string('email', 191)->unique();
            $table->string('avatar', 191);
            $table->float('ratio');
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
        Schema::dropIfExists('parners');
    }
}
