<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question', 255);
            $table->enum('question_type', ['A', 'B', 'C']);
            $table->boolean('is_email')->default(false);
            $table->string('available_answer', 255)->nullable();
            $table->unsignedInteger('sondage_id');
            $table->timestamps();

            // $table->foreign('question_type_id')->references('id')->on('questions_type')->onDelete('CASCADE');
            $table->foreign('sondage_id')->references('id')->on('sondages')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
