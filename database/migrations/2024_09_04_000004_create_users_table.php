<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('auth_provider')->nullable();
            $table->string('id_auth_provider')->nullable();
            $table->string('auth_provider_token')->nullable();
            $table->string('auth_provider_refresh_token')->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->string('remember_token')->nullable();
            $table->longText('auth_payload')->nullable();
            $table->boolean('privacy_policy_and_terms_of_service')->default(0)->nullable();
            $table->boolean('allow_session_create')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
