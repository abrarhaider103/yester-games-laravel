<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSessionMembersTable extends Migration
{
    public function up()
    {
        Schema::table('session_members', function (Blueprint $table) {
            $table->unsignedBigInteger('session_id')->nullable();
            $table->foreign('session_id', 'session_fk_10080721')->references('id')->on('game_sessions');
            $table->unsignedBigInteger('invited_member_id')->nullable();
            $table->foreign('invited_member_id', 'invited_member_fk_10097804')->references('id')->on('users');
        });
    }
}
