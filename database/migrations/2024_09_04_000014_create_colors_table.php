<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('color');
            $table->string('color_code');
            $table->string('status')->nullable();
            $table->string('foreground_color');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
