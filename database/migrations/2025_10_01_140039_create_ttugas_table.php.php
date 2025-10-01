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
        Schema::connection('maiadminmedan')->create('Ttugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idkelas')->unsigned();
            $table->bigInteger('idguru')->unsigned();
            $table->string('mapel', 100);
            $table->date('tglpenugasan');
            $table->date('tglpengumpulan')->nullable();
            $table->string('judul', 255);
            $table->text('deskripsi')->nullable();
            $table->string('lampiran', 255)->nullable();
            $table->enum('tugasFor', ['kelas','siswa']);
            
            // custom audit fields
            $table->timestamp('createat')->nullable();
            $table->string('createby', 50)->nullable();
            $table->timestamp('updateat')->nullable();
            $table->string('updateby', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ttugas');
    }
};
