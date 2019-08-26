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
        /**
         * Table Values : 
         *  - id => Primary Key
         *  - question => varchar(255)
         *  - question_number => integer superior or equal to 0
         *  - question_type => enum[A, B, C]
         *  - is_email => boolean
         *  - available_answer => varchar(255) who can be null
         *  - sondage_id => Foreign Key
         */
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question', 255);
            $table->unsignedInteger('question_number');
            $table->enum('question_type', ['A', 'B', 'C']);
            $table->boolean('is_email')->default(false);
            $table->string('available_answer', 255)->nullable();
            $table->unsignedInteger('sondage_id');
            $table->timestamps();

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
