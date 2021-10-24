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
        Schema::create('schedules', function (Blueprint $table) {

            $table->id();

            $table->year('year');
            // the value of towncode.weeknumber.year together
            $table->unsignedBigInteger('code')->unique();
            $table->unsignedTinyInteger('week_number');
            $table->json("schedule")->nullable()->default(null);
            $table->unsignedTinyInteger('next_week_number')->nullable()->default(null);
            $table->timestamps();


            // $table->unsignedBigInteger('town_id')->unique();
            $table->unsignedInteger('town_code');
            $table->foreign('town_code')->references('code')->on('towns');
            // $table->foreign('period_id')->references('id')->on('periods');

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by')->nullable()->default(null);
            $table->foreign('created_by')->references('id')->on("users");
            $table->foreign('modified_by')->references('id')->on("users");

            // $table->json('sunday_from');
            // $table->time('sunday_to')->nullable()->default(null);
            // $table->json('monday_from');
            // $table->time('monday_to')->nullable()->default(null);
            // $table->json('tuesday_from');
            // $table->time('tuesday_to')->nullable()->default(null);
            // $table->json('wednesday_from');
            // $table->time('wednesday_to')->nullable()->default(null);
            // $table->json('thursday_from');
            // $table->time('thursday_to')->nullable()->default(null);
            // $table->json('friday_from');
            // $table->time('friday_to')->nullable()->default(null);
            // $table->json('saturday_from');
            // $table->time('saturday_to')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
