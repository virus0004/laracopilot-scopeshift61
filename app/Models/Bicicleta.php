<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bicicleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'marca', 'modelo', 'numero_serie', 'categoria_id',
        'preco_hora', 'preco_dia', 'estado', 'cor', 'tamanho', 'descricao', 'imagem'
    ];

    protected $casts = [
        'preco_hora' => 'decimal:2',
        'preco_dia' => 'decimal:2'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function getEstadoBadgeAttribute()
    {
        return match($this->estado) {
            'disponivel' => 'bg-green-100 text-green-800',
            'alugada' => 'bg-blue-100 text-blue-800',
            'manutencao' => 'bg-yellow-100 text-yellow-800',
            'inativa' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800'
        };
    }
}