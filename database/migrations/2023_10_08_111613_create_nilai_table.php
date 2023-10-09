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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'nilai_user_id'
            );
            $table->foreignId('mapel_id')->constrained(
                table: 'mapel', indexName: 'nilai_mapel_id'
            );
            $table->foreignId('tahun_ajaran_id')->constrained(
                table: 'mapel', indexName: 'nilai_tahun_ajaran_id'
            );
            $table->integer('nilai_uts')->nullable();
            $table->integer('nilai_uas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
