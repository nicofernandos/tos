<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('maiadminmedan')->create('tcatsus1', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('tcatsus_id')->nullable(); // relasi manual, tanpa foreign key
            $table->string('detail', 255)->nullable(); 
            $table->string('keterangan', 255)->nullable();
            $table->timestamp('createat')->nullable();
            $table->timestamp('updateat')->nullable();
            $table->string('createby',50)->nullable();
            $table->string('updateby',50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('maiadminmedan')->dropIfExists('tcatsus1');
    }
};