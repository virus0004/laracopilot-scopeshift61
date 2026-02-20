<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bicicletas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('marca');
            $table->string('modelo');
            $table->string('numero_serie')->unique();
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->decimal('preco_hora', 8, 2)->default(0);
            $table->decimal('preco_dia', 8, 2)->default(0);
            $table->enum('estado', ['disponivel', 'alugada', 'manutencao', 'inativa'])->default('disponivel');
            $table->string('cor')->nullable();
            $table->string('tamanho')->nullable();
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bicicletas');
    }
};