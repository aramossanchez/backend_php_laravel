<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendships', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Player1_ID');
            $table->foreign('Player1_ID')
            ->references('id')
            ->on('players')
            ->unsigned()
            ->constrained('players')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedInteger('Player2_ID');
            $table->foreign('Player2_ID')
            ->references('id')
            ->on('players')
            ->unsigned()
            ->constrained('players')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('friendships');
    }
}
