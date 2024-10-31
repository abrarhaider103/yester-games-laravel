<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewssTable extends Migration
{
    public function up()
    {
        Schema::create('newss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contents');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('video_code')->nullable();
            $table->string('status')->nullable();
            $table->integer('download_count')->nullable();
            $table->integer('view_count')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
