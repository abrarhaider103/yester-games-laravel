<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGameSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('game_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10080710')->references('id')->on('users');
            $table->unsignedBigInteger('game_id')->nullable();
            $table->foreign('game_id', 'game_fk_10080711')->references('id')->on('games');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id', 'color_fk_10097815')->references('id')->on('colors');
        });
    }
}
