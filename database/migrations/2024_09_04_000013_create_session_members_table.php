<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionMembersTable extends Migration
{
    public function up()
    {
        Schema::create('session_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
