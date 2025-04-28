<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('isler', function (Blueprint $table) {
            $table->id();
            $table->string('is_no')->unique();
            $table->foreignId('musteri_id')->constrained('musteriler')->onDelete('cascade');
            $table->string('musteri_referans_no')->nullable();
            $table->timestamp('kayit_tarihi')->useCurrent();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('isler');
    }
};