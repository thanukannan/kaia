<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotelname');
            $table->string('contactperson');
            $table->string('address');
            $table->string('city');
            $table->string('district');
            $table->string('country');
            $table ->string('gst');
            $table->string('emailid')->unique();
            $table->string('mobilenumber', 20);
            $table->string('vendor')->nullable();
            $table->string('hotel_data');
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
        Schema::dropIfExists('_hotels');
    }
}
