<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'email', 'telefone', 'nif', 'morada', 'cidade', 'data_nascimento', 'notas'
    ];

    protected $casts = [
        'data_nascimento' => 'date'
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function pagamentos()
    {
        return $this->hasManyThrough(Pagamento::class, Reserva::class);
    }
}