<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('email_address');
            $table->longText('feedback')->nullable();
            $table->integer('is_checked')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
