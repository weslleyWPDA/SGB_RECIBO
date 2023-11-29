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
        Schema::create('end_emitente', function (Blueprint $table) {
            $table->id();
            $table->string('end_emitente');
            $table->integer('fazenda_id');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('end_emitente');
    }
};
