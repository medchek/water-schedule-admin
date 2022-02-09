<?php

use Database\Seeders\TownSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ar_name');
            $table->unsignedInteger('code')->unique();
            $table->timestamps();

            // whether the user can edit/delete this 
            $table->boolean('protected')->default(false);
            $table->unsignedBigInteger('added_by')->nullable()->default(null);
            $table->unsignedBigInteger('modified_by')->nullable()->default(null);
            $table->foreign('added_by')->references('id')->on('users');
            $table->foreign('modified_by')->references('id')->on('users');



            $table->unsignedBigInteger('wilaya_id');
            $table->foreign('wilaya_id')->references('id')->on('wilayas');
        });


        $seeder = new TownSeeder;
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('towns');
    }
}
