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
        Schema::table('sertifikasi', function (Blueprint $table) {
            $table->string('whatsapp', 20)->nullable()->change(); // // Ubah ke nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sertifikasi', function (Blueprint $table) {
            $table->bigInteger('whatsapp')->change(); // hanya jika sebelumnya integer
        });
    }
};
