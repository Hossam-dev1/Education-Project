<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id()->cascadeOnDelete();
            $table->foreignId('skill_id')->constrained()->cascadeOnDelete();
            $table->text('name');
            $table->text('desc');
            $table->string('img', 550)->nullable();
            $table->tinyInteger('questions_num');
            $table->smallInteger('duration_h');
            $table->integer('codes_num');
            $table->string('answer_model', 550)->nullable();

            $table->boolean('code')->default(true);

            $table->boolean('paid')->default(true);
            $table->boolean('active')->default(true);
            $table->enum('status', ['opend', 'closed'])->default('closed');
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
        Schema::dropIfExists('exams');
    }
}
