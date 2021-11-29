<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpotsTable extends Migration
{
    public function up()
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(true);
            $table->string('zal')->nullable();
            $table->string('number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spots');
    }
}
