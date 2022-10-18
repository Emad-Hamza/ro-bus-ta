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
        Schema::table('trips', function (Blueprint $table) {
            $table->dropForeign(['start_id']);
            $table->dropColumn('start_id');
            $table->dropForeign(['destination_id']);
            $table->dropColumn('destination_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->unsignedBigInteger('start_id');
            $table->unsignedBigInteger('destination_id');

            $table->foreign('start_id')->references('id')->on('stations');
            $table->foreign('destination_id')->references('id')->on('stations');
        });
    }
};
