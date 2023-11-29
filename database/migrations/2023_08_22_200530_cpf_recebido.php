<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cpf_recebido', function (Blueprint $table) {
            $table->id();
            $table->string('cpf_recebido');
            $table->integer('fazenda_id');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cpf_recebido');
    }
};
