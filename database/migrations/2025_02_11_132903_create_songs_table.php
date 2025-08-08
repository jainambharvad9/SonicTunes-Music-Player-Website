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
    Schema::disableForeignKeyConstraints();

    Schema::create('songs', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->foreignId('artist_id')->constrained();
        $table->foreignId('album_id')->nullable()->constrained();
        $table->string('genre')->nullable();
        $table->integer('duration')->nullable(); 
        $table->string('cover_image')->nullable(); 
        $table->string('song_file');
        $table->boolean('favorite_status')->default(false);
        $table->timestamps();
    });

    Schema::enableForeignKeyConstraints();
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
