<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id', 'bicicleta_id', 'data_inicio', 'data_fim',
        'tipo', 'estado', 'valor_total', 'notas'
    ];

    protected $casts = [
        'data_inicio' => 'datetime',
        'data_fim' => 'datetime',
        'valor_total' => 'decimal:2'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function bicicleta()
    {
        return $this->belongsTo(Bicicleta::class);
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }

    public function getEstadoBadgeAttribute()
    {
        return match($this->estado) {
            'pendente' => 'bg-yellow-100 text-yellow-800',
            'ativa' => 'bg-green-100 text-green-800',
            'concluida' => 'bg-blue-100 text-blue-800',
            'cancelada' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800'
        };
    }
}