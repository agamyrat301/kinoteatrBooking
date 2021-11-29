<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeansTable extends Migration
{
    public function up()
    {
        Schema::create('seans', function (Blueprint $table) {
            $table->id();
            $table->string('film_name');
            $table->timestamp('start_date');
            $table->string('seans_number')->unique();
            $table->string('duration')->nullable();
            $table->float('price');
            $table->string('hall')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seans');
    }
}
