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
        Schema::create('barang_jasa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('tgl_spk');
            $table->string('nomor_surat_spk')->nullable();
            $table->string('jns_belanja');
            $table->integer('nilai_kontrak');
            $table->string('uraian_pengadaan');
            $table->string('nomor_kontrak')->nullable();
            $table->date('tgl_mulai_kontrak');
            $table->date('tgl_berakhir_kontrak');
            $table->integer('jumlah_hari_kontrak');
            $table->string('nomor_tgl_adendum')->nullable();
            $table->string('uraian_adendum');
            $table->date('tgl_mulai_adendum');
            $table->date('tgl_berakhir_adendum');
            $table->integer('jumlah_hari_adendum');
            $table->string('bentuk_pelaksanaan');
            $table->integer('nilai_pelaksanaan');
            $table->date('tgl_mulai_pelaksanaan');
            $table->date('tgl_berakhir_pelaksanaan');
            $table->string('bentuk_pemeliharaan');
            $table->integer('nilai_pemeliharaan');
            $table->date('tgl_mulai_pemeliharaan');
            $table->date('tgl_selesai_pemeliharaan');
            $table->string('nomor_sumber_dpa')->nullable();
            $table->date('tgl_sumber_dpa');
            $table->integer('nilai_sumber_dpa');
            $table->string('metode_pengadaan_dpa');

            // diisi menggunakan metode update
            $table->enum('status', ['Diproses', 'Disetujui', 'Ditolak'])->default('Diproses');
            $table->string('nomor_spmk')->nullable();
            $table->date('tgl_spmk')->nullable();
            $table->string('nomor_bast')->nullable();
            $table->date('tgl_bast')->nullable();
            $table->integer('nilai_bast')->nullable();
            $table->date('tgl_pho')->nullable();
            $table->date('tgl_fho')->nullable();
            $table->date('tgl_sp2d')->nullable();
            $table->string('nomor_sp2d')->nullable();
            $table->integer('nilai_sp2d')->nullable();
            $table->string('persentase_progress')->default('0');
            $table->enum('status_lapor', ['Belum', 'Lapor', 'Disetujui', 'Ditolak'])->default('Belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_jasa');
    }
};
