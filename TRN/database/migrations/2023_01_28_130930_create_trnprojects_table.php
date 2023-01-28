<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trnprojects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('title');
            $table->string('progress');
            $table->string('status');
            $table->string('priority');
            $table->string('budget',255)->nullable();
            $table->string('givenby');
            $table->string('category');
            $table->string('duedate');
            $table->unsignedBigInteger('User_ID');
            $table->foreign('User_ID')->references('admin_id')->on('admin');
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
        Schema::dropIfExists('trnprojects');
    }
};