<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_id')->constrained('reservas')->onDelete('cascade');
            $table->decimal('valor', 10, 2);
            $table->enum('metodo', ['dinheiro', 'cartao', 'transferencia', 'mbway'])->default('dinheiro');
            $table->enum('estado', ['pendente', 'pago', 'reembolsado'])->default('pendente');
            $table->string('referencia')->nullable();
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
};