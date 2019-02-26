<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('bookingdate');
            $table->integer('clientname')->unsigned();
            $table->foreign('clientname')->references('id')->on('clients');
            $table->string('booking_given_by');
            $table->integer('hotelname')->unsigned();
            $table->foreign('hotelname')->references('id')->on('hotels');
            $table->string('guestname');
            $table->string('occupancy');
            $table->string('hotel_concern_person');
            $table->string('checkin');
            $table->string('checkout');
            $table->string('no_of_roomnights');
            $table->string('bookingstatus');
            $table->string('confirmationnumber');
            $table->string('roomtype');
            $table->string('tariff_perday');
            $table->string('gst_method');
            $table->string('taxpercentage');
            $table->string('taxamount');
            $table->string('total_with_tax');
            $table->string('commissiontype');
            $table->string('commission_amount')->nullable();
            $table->string('commission_percentage')->nullable();
            $table->string('commission_percentage_amount')->nullable();
            $table->string('netamount');
            $table->string('kaia_commission');
            $table->string('mop');
            $table->string('paymentstatus')->default(0);
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
        Schema::dropIfExists('bookings');
    }
}