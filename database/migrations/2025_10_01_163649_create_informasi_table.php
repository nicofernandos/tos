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
        Schema::connection('maiadminmedan')->create('tinfo', function ($table) {
            $table->unsignedBigInteger('id')->primary();

            $table->bigInteger('idkelas')->unsigned();
            
            $table->string('tglinfo',50)->nullable();
            $table->text('deskripsi')->nullable();
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
        Schema::connection('maiadminmedan')->dropIfExists('info');
    }
};
