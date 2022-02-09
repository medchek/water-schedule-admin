<?php

use Database\Seeders\WilayaSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('ar_name')->unique()->nullable()->default(null);
            $table->unsignedInteger('code')->nullable()->default(null)->unique();
            $table->timestamps();
        });

        $seeder = new WilayaSeeder;
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wilayas');
    }
}
