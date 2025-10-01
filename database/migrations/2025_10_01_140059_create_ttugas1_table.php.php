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
        Schema::connection('maiadminmedan')->create('Ttugas1', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Relasi ke Ttugas
            $table->bigInteger('idtugas')->unsigned();
            $table->foreign('idtugas')->references('id')->on('Ttugas')->onDelete('cascade');

            // Relasi ke Tsiswa
            $table->bigInteger('idsiswa')->unsigned();

            // Kolom detail
            $table->enum('status',['belum','sudah'])->default('belum');
            $table->decimal('nilai',5,2)->nullable();
            $table->text('catatan')->nullable();

            // Audit fields
            $table->timestamp('createat')->nullable();
            $table->string('createby',50)->nullable();
            $table->timestamp('updateat')->nullable();
            $table->string('updateby',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ttugas1');
    }
};
