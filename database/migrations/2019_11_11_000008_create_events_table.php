<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('label');
            $table->text('description');
            $table->string('location');
            $table->dateTime('date');
            $table->float('price');
            $table->boolean('recurring');
            $table->boolean('hidden');
            $table->timestamps();

            $table->unsignedBigInteger('meta_event_id');
            $table->foreign('meta_event_id')->references('id')->on('meta_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
