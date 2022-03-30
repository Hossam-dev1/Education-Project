<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id()->cascadeOnDelete();
            $table->text('title');
            $table->text('subject');
            $table->string('video_cover', 550);
            $table->string('video', 550);
            $table->smallInteger('codes_num')->nullable();

            // $table->string('all_codes')->nullable();

            $table->boolean('paid')->default(true);
            $table->boolean('active')->default(true);
            $table->enum('status', ['opend', 'closed']);

            $table->foreignId('skill_id')->constrained();
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
        Schema::dropIfExists('videos');
    }
}
