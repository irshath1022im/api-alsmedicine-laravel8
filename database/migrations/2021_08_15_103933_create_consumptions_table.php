<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumptions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('batch_number_id');
            $table->integer('qty');
            $table->unsignedBigInteger('user_id');

            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('batch_number_id')->references('id')->on('batch_numbers');
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
        Schema::dropIfExists('consumptions');
    }
}
