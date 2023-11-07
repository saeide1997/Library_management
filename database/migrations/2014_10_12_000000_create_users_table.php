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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Gender');
            $table->string('Email')->unique();
            $table->string('password');
            $table->string('Phone');
            $table->rememberToken();
            $table->timestamps();

            $table->unsignedBigInteger('book_id');

            $table->foreign('book_id')->references('id')->on('books')->onDelete('No Action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
