<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('book_genre', function (Blueprint $table) {
            $table->integer('book_id')->unsigned();
            $table->integer('genre_id')->unsigned();
//            $table->foreign('book_id')
//                ->references('id')
//                ->on('books')
//                ->onDelete('cascade');
//            $table->foreign('genre_id')
//                ->references('id')
//                ->on('genres')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('book_genres');
    }
}
