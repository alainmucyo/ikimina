<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmountsTable extends Migration
{

    public function up()
    {
        Schema::create('amounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount')->nullable();
            $table->integer('year');
            $table->integer('cooperative_id');
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
        Schema::dropIfExists('amounts');
    }
}
