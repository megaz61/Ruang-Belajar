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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('User');
            $table->integer('NIP')->unique()->nullable();
            $table->string('username')->unique()->nullable();
            $table->bigInteger('nomor');
            $table->string('gender')->nullable();
            $table->string('foto')->nullable();
            $table->string('bio')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.php artisan cache:clear
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
