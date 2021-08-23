<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiving_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiving_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('batch_number_id');
            $table->integer('qty');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('cost', 8, 2);
            $table->text('remark');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('batch_number_id')->references('id')->on('batch_numbers');
            $table->foreign('receiving_id')->references('id')->on('receivings');
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
        Schema::dropIfExists('receiving_items');
    }
}
