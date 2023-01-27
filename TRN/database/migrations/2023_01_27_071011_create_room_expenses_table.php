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
        Schema::create('room_expenses', function (Blueprint $table) {
            $table->id('Expenses_ID');
            $table->string('Date');
            $table->string('Deposit',255)->nullable();
            $table->string('Withdraw',255)->nullable();
            $table->string('Remark');
            $table->string('Status');
            $table->string('Date3');
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
        Schema::dropIfExists('room_expenses');
    }
};