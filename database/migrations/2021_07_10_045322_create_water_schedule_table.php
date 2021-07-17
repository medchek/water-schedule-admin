<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaterScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 1 schedule entry -> 1 wilaya
         * 1 schedule entry -> 1 town
         * 1 schedule entry -> 1 period
         * 1 period belongs to 1 schedule entry
         * 1 wilaya belongs to many schedule entry
         * 1 town belongs to many schedule entry
         */
        Schema::create('water_schedule', function (Blueprint $table) {

            $table->id();
            $table->time('sunday_from')->nullable()->default(null);
            $table->time('sunday_to')->nullable()->default(null);
            $table->time('monday_from')->nullable()->default(null);
            $table->time('monday_to')->nullable()->default(null);
            $table->time('tuesday_from')->nullable()->default(null);
            $table->time('tuesday_to')->nullable()->default(null);
            $table->time('wednesday_from')->nullable()->default(null);
            $table->time('wednesday_to')->nullable()->default(null);
            $table->time('thursday_from')->nullable()->default(null);
            $table->time('thursday_to')->nullable()->default(null);
            $table->time('friday_from')->nullable()->default(null);
            $table->time('friday_to')->nullable()->default(null);
            $table->time('saturday_from')->nullable()->default(null);
            $table->time('saturday_to')->nullable()->default(null);
            $table->timestamps();


            $table->unsignedBigInteger('period_id')->unique();
            $table->foreign('period_id')->references('id')->on('periods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_schedule');
    }
}
