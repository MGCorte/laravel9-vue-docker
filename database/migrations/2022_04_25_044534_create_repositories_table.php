<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepositoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('repository_id')->unsigned();
            $table->string('avatar_url')->nullable();
            $table->string('name')->nullable();
            $table->string('full_name')->nullable();
            $table->text('description')->nullable();
            $table->string('html_url')->nullable();
            $table->string('homepage')->nullable();
            $table->string('language')->nullable();
            $table->string('stargazers_count')->nullable();
            $table->string('topics')->nullable();
            $table->bigInteger('language_id')->unsigned()->nullable();
            $table->foreign('language_id')->references('id')->on('languages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repositories');
    }
}
