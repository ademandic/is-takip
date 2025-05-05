<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('teknik_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('is_id')->constrained('isler')->onDelete('cascade');

            $table->string('sistem_tipi')->nullable();
            $table->string('sogutma_burcu')->nullable();
            $table->string('nozzle_adedi')->nullable();
            $table->string('kalip_goz_adedi')->nullable();
            $table->string('giris_capi')->nullable();
            $table->string('sr_alani')->nullable();

            $table->string('parca_gramaji')->nullable();
            $table->string('parca_et_kalinligi')->nullable();
            $table->string('malzeme_bilgisi')->nullable();
            $table->enum('parca_gorselligi', ['evet', 'hayir'])->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teknik_data');
    }
};
