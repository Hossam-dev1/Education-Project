<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_video', function (Blueprint $table) {
            $table->id()->cascadeOnDelete();
            
            $table->foreignId('video_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->enum('status', ['opend', 'closed'])->default('closed');
            $table->boolean('coded')->default(true);

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
        Schema::dropIfExists('user_video');
    }
}
