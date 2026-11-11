<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nip', 30)->unique()->nullable();
            $table->string('nama_guru', 150);
            $table->string('gelar', 50)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L');
            $table->string('bidang_studi', 100)->nullable();
            $table->string('telepon', 25)->nullable();
            $table->string('foto')->nullable();
            $table->string('status_kepegawaian', 50)->default('PNS');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru');
    }
}
