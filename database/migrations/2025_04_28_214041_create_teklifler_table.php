<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teklifler', function (Blueprint $table) {
            $table->id();
            $table->string('teklif_no');
            $table->foreignId('is_id')->constrained('isler')->onDelete('cascade');
            $table->text('aciklama')->nullable();
            $table->decimal('tutar', 12, 2)->nullable();
            $table->decimal('alis_tutar', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teklifler');
    }
};