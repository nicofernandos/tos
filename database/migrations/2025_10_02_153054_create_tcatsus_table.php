<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('maiadminmedan')->create('tcatsus', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->date('tanggal')->nullable();
            $table->string('namaguru', 100)->nullable();
            $table->unsignedBigInteger('idguru')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('jumlahpoin')->nullable();
            $table->string('kelas', 50)->nullable(); 
            $table->unsignedBigInteger('idkelas')->nullable();
            $table->unsignedBigInteger('idsiswa')->nullable(); 
            $table->timestamp('createat')->nullable();
            $table->timestamp('updateat')->nullable();
            $table->string('createby',50)->nullable();
            $table->string('updateby',50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('maiadminmedan')->dropIfExists('tcatsus');
    }
};