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
        Schema::create('log_pemilihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemilih_id')->constrained('users')->onDelete('cascade')->unique();
            $table->integer('pilihan');
            $table->string('ip_address');
            $table->string('user_agent');
            $table->date('voted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_pemilihans');
    }
};
