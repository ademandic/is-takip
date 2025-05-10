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
        Schema::table('teknik_data', function (Blueprint $table) {
            $table->string('nozzle_capi')->nullable()->after('nozzle_adedi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teknik_data', function (Blueprint $table) {
            $table->dropColumn('nozzle_capi');
        });
    }
};
