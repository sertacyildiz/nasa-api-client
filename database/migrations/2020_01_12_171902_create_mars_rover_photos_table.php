<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarsRoverPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mars_rover_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('img_id')->nullable();
            $table->string('img_src')->nullable();
            $table->date('earth_date');
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
        Schema::dropIfExists('rover_photos');
    }
}
