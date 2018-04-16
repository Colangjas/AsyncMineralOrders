<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulations_id');
            $table->text('viscosity');
            $table->text('instrument_method');
            $table->float('spec');
            $table->float('lower_tolerance');
            $table->float('upper_tolerance');
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
        Schema::drop('testing');
    }
}
