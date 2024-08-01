<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTracksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tracks', function (Blueprint $table) {
            // Verifique se a coluna não existe antes de adicionar
            if (!Schema::hasColumn('tracks', 'title')) {
                $table->string('title')->after('id');
            }
            if (!Schema::hasColumn('tracks', 'duration')) {
                $table->integer('duration')->after('title');
            }
            if (!Schema::hasColumn('tracks', 'album_id')) {
                $table->foreignId('album_id')->constrained()->onDelete('cascade')->after('duration');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tracks', function (Blueprint $table) {
            // Remova as colunas se existirem
            if (Schema::hasColumn('tracks', 'album_id')) {
                $table->dropForeign(['album_id']);
                $table->dropColumn('album_id');
            }
            if (Schema::hasColumn('tracks', 'duration')) {
                $table->dropColumn('duration');
            }
            if (Schema::hasColumn('tracks', 'title')) {
                $table->dropColumn('title');
            }
        });
    }
}