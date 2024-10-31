<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nick_name')->unique();
            $table->string('bio')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
