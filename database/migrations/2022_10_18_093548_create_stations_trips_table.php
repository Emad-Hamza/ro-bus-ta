<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations_trips', function (Blueprint $table) {
               
			$table->unsignedBigInteger('trip_id')->nullable();
		    $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            
            $table->unsignedBigInteger('station_id')->nullable();
			$table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');

            $table->integer('station_order');
            $table->timestamps();

            $table->index(['trip_id', 'station_id', 'station_order']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations_trips');
    }
};
