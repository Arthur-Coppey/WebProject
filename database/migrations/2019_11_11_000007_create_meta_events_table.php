<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('meta_events', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('label');
            $table->text('description');
            $table->string('location');
            $table->dateTime('start_date');
            $table->integer('occurrences');
            $table->integer('frequency');
            $table->float('price');
            $table->boolean('hidden');
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_events');
    }
}
