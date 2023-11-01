<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id_one');
            $table->unsignedBigInteger('user_id_two');
            $table->text('last_message')->nullable(); // Column to store the last message
            $table->unsignedBigInteger('last_message_user_id')->nullable(); // ID of the user who sent the last message
            $table->timestamps();

            $table->foreign('user_id_one')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id_two')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('last_message_user_id')->references('id')->on('users')->onDelete('set null'); // Set to null if user is deleted
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
