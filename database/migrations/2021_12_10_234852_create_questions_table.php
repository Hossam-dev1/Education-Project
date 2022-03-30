<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            
            $table->text('title');
            $table->string('img', 550)->nullable();
            $table->text('option_1', 255);
            $table->text('option_2', 255);
            $table->text('option_3', 255);
            $table->text('option_4', 255);
            $table->tinyInteger('right_ans');


            $table->foreignId('exam_id')->constrained();
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
        Schema::dropIfExists('questions');
    }
}
