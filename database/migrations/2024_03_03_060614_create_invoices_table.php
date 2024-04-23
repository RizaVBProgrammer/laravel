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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('no_po');
            $table->date('tanggal');
            $table->string('no_invoice');
            $table->string('term');
            $table->string('produk');
            $table->string('nama_kapal');
            $table->string('wilayah_pengisian');
            $table->integer('qty');
            $table->string('satuan');
            $table->integer('harga');
            $table->float('harga_dasar');
            $table->float('ppn');
            $table->float('jumlah_harga_dasar');
            $table->float('jumlah_ppn');
            $table->float('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
