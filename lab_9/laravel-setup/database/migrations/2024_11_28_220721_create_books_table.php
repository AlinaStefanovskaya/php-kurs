<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->year('publication_year');
        $table->decimal('price', 8, 2);
        $table->foreignId('author_id')->constrained()->onDelete('cascade');
        $table->foreignId('genre_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

};
