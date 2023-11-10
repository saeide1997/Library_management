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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
<<<<<<< HEAD



=======
            $table->unsignedBigInteger('shelf_no');
>>>>>>> 9c27f229e8fcf512da449cdd1a61de1ce727cfdb
            $table->date('Date_borrowing');
            $table->date('Due_date');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

<<<<<<< HEAD

//            $table->timestamps();
=======
            $table->timestamps();
>>>>>>> 9c27f229e8fcf512da449cdd1a61de1ce727cfdb
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
