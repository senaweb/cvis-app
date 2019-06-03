<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('vehicle_id')->comment('The id of the vehicle which got involved in the incident');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');

            $table->unsignedBigInteger('driver_id')->comment('The id of the driver who was driving that vehicle');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');

            $table->string('incident_type');
            $table->date('date_of_incident');
            $table->time('time_of_incident');
            $table->string('location');
            $table->integer('passengers')->default(0);
            $table->enum('casualties', ['no', 'yes'])->default('no');
            $table->enum('properties_damaged', ['no', 'yes'])->default('no');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('incidents');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('drivers');
    }
}
