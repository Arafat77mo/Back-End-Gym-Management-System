<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('equipment');
            $table->string('discription');
            $table->integer('sets');
            $table->integer('reps');
            $table->integer('rest');
            $table->string('image');
            $table->unsignedBigInteger('single_workout_caregorie_id');
            $table->foreign('single_workout_caregorie_id')->references('id')->on('single_workout_caregories');
            $table->timestamps();
            $table->softDeletes();
    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercises');
    }
}
