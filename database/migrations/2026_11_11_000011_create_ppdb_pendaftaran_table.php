<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpdbPendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppdb_pendaftaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_pendaftaran', 30)->unique();
            $table->string('nisn', 15)->unique();
            $table->string('nik', 20)->nullable();
            $table->string('nama_lengkap', 150);
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L');
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('asal_sekolah', 150);
            $table->unsignedBigInteger('jurusan_id_1');
            $table->unsignedBigInteger('jurusan_id_2')->nullable();
            $table->string('nama_wali', 150);
            $table->string('nomor_wa_wali', 25);
            $table->text('alamat_lengkap');
            $table->string('berkas_ijazah')->nullable();
            $table->string('berkas_kk')->nullable();
            $table->string('berkas_akta')->nullable();
            $table->enum('status_pendaftaran', ['Menunggu Verifikasi', 'Diverifikasi', 'Diterima', 'Ditolak'])->default('Menunggu Verifikasi');
            $table->text('catatan_verifikasi')->nullable();
            $table->timestamps();

            $table->foreign('jurusan_id_1')->references('id')->on('jurusan')->onDelete('cascade');
            $table->foreign('jurusan_id_2')->references('id')->on('jurusan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppdb_pendaftaran');
    }
}
