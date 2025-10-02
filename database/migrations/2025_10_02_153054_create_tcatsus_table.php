<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tcatsus1', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tcatsus_id')->nullable(); // relasi manual, tanpa foreign key
            $table->string('detail', 255)->nullable(); // detail kasus
            $table->string('keterangan', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tcatsus1');
    }
};