<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id('workshop_id');
            $table->string('workshop_name');
            $table->string('hosted_by');
            $table->string('country');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('contact');
            $table->string('user_email');
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->time('time');
            $table->integer('attendees');
            $table->integer('payment');
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
