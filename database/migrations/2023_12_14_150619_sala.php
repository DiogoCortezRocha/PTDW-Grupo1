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
        //
        Schema::create('Sala', function (Blueprint $table) {
            $table->string('numero');
            $table->enum('tipo', ['normal', 'laboratorial','informatica']);
            $table->primary('numero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('Sala');
    }
};
