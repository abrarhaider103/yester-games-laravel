<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomDatasTable extends Migration
{
    public function up()
    {
        Schema::create('custom_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('content');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
