<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 18)->nullable()->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('role', ['pegawai', 'admin', 'superadmin']);
            $table->enum('jenisKelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('agama', ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha', 'Konghucu']);
            $table->string('alamat')->nullable();
            $table->string('noHp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('pendidikanTerakhir')->nullable();
            $table->string('statusPerkawinan')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('golongan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('password');
            $table->timestamps();
        });

        DB::table('users')->insert([
            'nip' => null,
            'nama' => 'Super Admin',
            'email' => 'su-admin@urproj.com',
            'role' => 'superadmin',
            'jenisKelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'alamat' => null,
            'noHp' => null,
            'tempat_lahir' => null,
            'tanggal_lahir' => null,
            'pendidikanTerakhir' => null,
            'statusPerkawinan' => null,
            'pangkat' => null,
            'golongan' => null,
            'jabatan' => null,
            'unit_kerja' => null,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
