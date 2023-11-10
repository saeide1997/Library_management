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
        Schema::create('returnns', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('borrowing_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');

            $table->date('Date_returned');
            $table->date('Due_date');
            $table->bigInteger('Fine');
            // $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('borrowing_id')->references('id')->on('borrowings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returnns');
    }
};
