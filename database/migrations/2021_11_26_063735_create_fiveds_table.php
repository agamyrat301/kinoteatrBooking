<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFivedsTable extends Migration
{
    public function up()
    {
        Schema::create('fiveds', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->unsignedBigInteger('spot_id')->nullable();
            $table->foreign('spot_id')->references('id')->on('spots')->onDelete('set null');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('fiveds');
    }
}
