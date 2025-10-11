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
        Schema::connection('maiadminmedan')->create('traport', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('idta');
            $table->unsignedBigInteger('idkel');
            $table->unsignedBigInteger('idk');
            $table->unsignedBigInteger('idsis');
            $table->unsignedBigInteger('idjenisraport');
            $table->string('tipe',100);
            $table->text('deskripsi')->nullable();
            $table->string('raport',255)->nullable();

            $table->string('createdby', 100)->nullable();
            $table->string('updatedby', 100)->nullable();
            $table->timestamp('createdat')->useCurrent();
            $table->timestamp('updatedat')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('maiadminmedan')->dropIfExists('traport');
    }
};
