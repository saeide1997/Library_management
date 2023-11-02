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
        Schema::create('shelves', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('Book_id');
            $table->bigInteger('Shelf_no');
            $table->smallInteger('floor');
            // $table->timestamps();
            $table->foreign('Book_id')->references('id')->on('books')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shelves');
    }
};
