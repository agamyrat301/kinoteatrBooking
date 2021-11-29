<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number')->unique();
            $table->unsignedBigInteger('spot_id')->nullable();
            $table->unsignedBigInteger('seans_id')->nullable();
            $table->foreign('spot_id')->references('id')->on('spots')->onDelete('set null');
            $table->foreign('seans_id')->references('id')->on('seans')->onDelete('set null');
            $table->timestamps();
        });
    }
  
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
