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
        Schema::table('users', function (Blueprint $table) {
            $table->text('alamat_ktp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kecamatan')->nullable();
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupaten')->onDelete('set null');
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsi')->onDelete('set null');
            $table->string('nomor_telepon_rumah')->nullable();
            $table->string('nomor_telepon_hp')->nullable();
            $table->enum('kewarganegaraan', ['WNI Asli', 'WNI Keturunan', 'WNA'])->default('WNI Asli');
            $table->string('kewarganegaraan_country')->nullable(); // For WNA
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir_ijasah')->nullable();
            $table->foreignId('kabupaten_lahir')->nullable()->constrained('kabupaten')->onDelete('set null');
            $table->foreignId('provinsi_lahir')->nullable()->constrained('provinsi')->onDelete('set null');
            $table->string('tempat_lahir_luar_negeri')->nullable();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->nullable();
            $table->enum('status_menikah', ['Belum menikah', 'Menikah', 'Lain-lain'])->nullable();
            $table->foreignId('agama_id')->nullable()->constrained('agama')->onDelete('set null');
   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
            'alamat_ktp',
            'alamat',
            'kecamatan',
            'kabupaten_id',
            'provinsi_id',
            'nomor_telepon_rumah',
            'nomor_telepon_hp',
            'kewarganegaraan',
            'kewarganegaraan_country',
            'tanggal_lahir',
            'tempat_lahir_ijasah',
            'kabupaten_lahir',
            'provinsi_lahir',
            'tempat_lahir_luar_negeri',
            'jenis_kelamin',
            'status_menikah',
            'agama_id',
        ]);
        });
    }
};
