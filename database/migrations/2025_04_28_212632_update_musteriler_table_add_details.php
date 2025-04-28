<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('musteriler', function (Blueprint $table) {
            $table->string('tipi')->nullable();
            $table->text('adres')->nullable();
            $table->string('ilgili_kisi')->nullable();
            $table->string('ilgili_kisi_email')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('musteriler', function (Blueprint $table) {
            $table->dropColumn(['tipi', 'adres', 'ilgili_kisi', 'ilgili_kisi_email']);
        });
    }
};