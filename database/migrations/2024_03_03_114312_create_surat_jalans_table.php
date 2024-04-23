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
        Schema::create('surat_jalans', function (Blueprint $table) {
            $table->id();
            $table->string('kepada');
            $table->string('up');
            $table->date('tanggal');
            $table->string('no_surat');
            $table->string('no_po');
            $table->string('tujuan');
            $table->string('contact');
            $table->string('no_telp');
            $table->integer('qty');
            $table->string('jenis');
            $table->string('nama_transportir');
            $table->string('segel_atas');
            $table->string('segel_bawah');
            $table->string('plat');
            $table->string('pengirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_jalans');
    }
};
