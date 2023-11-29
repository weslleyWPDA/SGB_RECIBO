<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recibos', function (Blueprint $table) {
            $table->id();
            $table->string('recebi');
            $table->string('cpf_recebido')->nullable()->default(null);
            $table->string('endereco');
            $table->double('valor', 10, 2);
            $table->string('referente');
            $table->string('cidade');
            $table->string('emitente');
            $table->string('end_emitente');
            $table->string('cpf_emitente')->nullable()->default(null);
            $table->string('rg')->nullable()->default(null);
            $table->date('data');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('fazenda_id')->default('0')->constrained('fazendas');
            $table->integer('delete')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recibos');
    }
};
