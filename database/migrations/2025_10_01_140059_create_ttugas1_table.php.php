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

        Schema::connection('maiadminmedan')->create('ttugas1', function (Blueprint $table) {
        $table->unsignedBigInteger('id')->primary(); // PK manual, bukan auto increment

        $table->unsignedBigInteger('idtugas'); // FK ke ttugas
        $table->foreign('idtugas')->references('id')->on('ttugas')->onDelete('cascade');

        $table->unsignedBigInteger('idsiswa'); // FK ke tsiswa (pastikan tsiswa.id juga PK)
        // $table->foreign('idsiswa')->references('id')->on('tsiswa')->onDelete('cascade');

        $table->enum('status', ['belum', 'sudah'])->default('belum');
        $table->decimal('nilai', 5, 2)->nullable();
        $table->text('catatan')->nullable();

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
        Schema::connection('maiadminmedan')->dropIfExists('ttugas1');
    }
};
