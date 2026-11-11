<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMataPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_mapel', 30)->unique();
            $table->string('nama_mapel', 150);
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->string('kelompok', 50)->default('Umum'); // Normatif, Adaptif, Produktif
            $table->unsignedSmallInteger('kkm')->default(75);
            $table->timestamps();

            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_pelajaran');
    }
}
