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
        Schema::connection('maiadminmedan')->create('tnilai', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('idta');  //tahunajaran
            $table->unsignedBigInteger('idk'); //idguru
            $table->unsignedBigInteger('idkel'); //idkelas
            $table->unsignedBigInteger('idsis'); //idsiswa
            $table->unsignedBigInteger('idpel'); //idpelajaran
            $table->string('nilai',100)->nullable();
            $table->text('ket')->nullable();


            //custom audit fields
            $table->timestamp('createdat')->nullable();
            $table->string('createdby', 50)->nullable();
            $table->timestamp('updatedat')->nullable();
            $table->string('updatedby', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('maiadminmedan')->dropIfExists('tnilai');
    }
};
