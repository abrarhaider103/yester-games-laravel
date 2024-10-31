<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToChatsTable extends Migration
{
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->unsignedBigInteger('session_id')->nullable();
            $table->foreign('session_id', 'session_fk_10097821')->references('id')->on('game_sessions');
            $table->unsignedBigInteger('message_from_id')->nullable();
            $table->foreign('message_from_id', 'message_from_fk_10097822')->references('id')->on('users');
        });
    }
}
