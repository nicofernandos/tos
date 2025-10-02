<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tcatsus', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->string('namaguru', 100)->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('jumlahpoin')->nullable();
            $table->string('kelas', 50)->nullable(); 
            $table->unsignedBigInteger('idsiswa')->nullable(); // tidak pakai foreign key
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tcatsus');
    }
};