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
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nama_materi')->required();
            $table->string('file')->required();
            $table->string('thumbnail')->nullable();
            $table->string('tingkatan_pendidikan')->required();
            $table->string('kelas')->required();
            $table->string('topik')->nullable();
            $table->string('tipe_materi')->required();
            $table->string('sumber')->nullable();
            $table->integer('materi_view')->default(0);
            $table->longText('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};
