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
        Schema::create('pelaporan_perjadins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('perjalanan_dinas_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('perjalanan_dinas_id')->references('id')->on('perjalanan_dinas');
            $table->string('nama');
            $table->string('nip', 18);
            $table->string('keperluan_perjadin');
            $table->integer('jumlah_dibayarkan');
            $table->string('jns_penginapan');
            $table->string('tujuan');
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->string('jns_transportasi_berangkat');
            $table->string('jns_transportasi_kembali');
            $table->string('nama_transportasi_berangkat');
            $table->string('nama_transportasi_kembali');
            $table->string('nomor_tiket_berangkat');
            $table->string('nomor_tiket_kembali');
            $table->string('nomor_kursi_berangkat');
            $table->string('nomor_kursi_kembali');
            $table->integer('harga_berangkat');
            $table->integer('harga_kembali');
            $table->string('bukti_akomodasi');
            $table->integer('total_biaya_akomodasi');
            $table->string('bukti_berangkat');
            $table->integer('total_biaya_berangkat');
            $table->string('bukti_kembali');
            $table->integer('total_biaya_kembali');
            $table->enum('proses', ['Diproses', 'Disetujui', 'Ditolak'])->default('Diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaporan_perjadin');
    }
};
