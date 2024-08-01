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
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Adiciona a coluna para o título da música
            $table->integer('duration'); // Adiciona a coluna para a duração da música (em segundos)
            $table->foreignId('album_id')->constrained()->onDelete('cascade'); // Adiciona a chave estrangeira para o álbum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};