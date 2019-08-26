<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
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
         *  - question_id => Foreign Key
         *  - response => varchar(255)
         *  - hash_path => varchar(255)
         */
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('question_id');
            $table->string('response', 255);
            $table->string('hash_path', 255);
            $table->timestamps();
            
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responses');
    }
}
