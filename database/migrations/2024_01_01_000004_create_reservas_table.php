<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('bicicleta_id')->constrained('bicicletas')->onDelete('cascade');
            $table->datetime('data_inicio');
            $table->datetime('data_fim');
            $table->enum('tipo', ['hora', 'dia'])->default('dia');
            $table->enum('estado', ['pendente', 'ativa', 'concluida', 'cancelada'])->default('pendente');
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};