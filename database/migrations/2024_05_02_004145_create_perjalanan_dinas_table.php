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
        Schema::create('perjalanan_dinas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('keperluan_perjadin');
            $table->integer('jumlah_dibayarkan');
            $table->string('tujuan');
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->integer('jumlah_hari');
            $table->integer('uang_harian');
            $table->integer('uang_total');
            $table->integer('biaya_akomodasi');
            $table->integer('biaya_lain');
            $table->integer('jumlah_biaya');
            $table->enum('status', ['Diproses', 'Disetujui', 'Ditolak'])->default('Diproses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perjalanandinas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
