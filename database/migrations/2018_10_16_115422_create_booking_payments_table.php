<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->integer('bookingId')->unsigned()->unique();
            $table->foreign('bookingId')->references('id')->on('bookings');
            $table->integer('clientId')->unsigned()->nullable();
            $table->foreign('clientId')->references('id')->on('clients');
            $table->integer('hotelId')->unsigned()->nullable();
            $table->foreign('hotelId')->references('id')->on('hotels');
            $table->string('amount');
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
        Schema::dropIfExists('booking_payments');
    }
}
