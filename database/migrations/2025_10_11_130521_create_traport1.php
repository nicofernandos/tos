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
        Schema::connection('maiadminmedan')->create('traport1', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('idtrap1');

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
        Schema::connection('maiadminmedan')->dropIfExists('traport1');
    }
};
