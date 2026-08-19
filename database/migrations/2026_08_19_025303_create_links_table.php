<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('url');
            $table->string('ikon')->nullable();          // emoji atau class icon
            $table->string('warna_bg')->default('#FF6B6B'); // warna tombol
            $table->string('warna_teks')->default('#FFFFFF');
            $table->integer('urutan')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
