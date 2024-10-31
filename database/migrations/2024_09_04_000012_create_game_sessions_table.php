<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('game_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_name');
            $table->longText('game_object')->nullable();
            $table->string('session_code')->nullable();
            $table->string('invitation_code')->unique();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
