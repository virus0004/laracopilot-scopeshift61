<?php

namespace App\Http\Controllers;

use App\Models\Bicicleta;
use App\Models\Categoria;
use App\Models\Reserva;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $bicicletas = Bicicleta::with('categoria')->where('estado', 'disponivel')->limit(6)->get();
        $categorias = Categoria::withCount('bicicletas')->get();
        $totalBicicletas = Bicicleta::count();
        $totalClientes = Cliente::count();
        $totalReservas = Reserva::count();
        return view('welcome', compact('bicicletas', 'categorias', 'totalBicicletas', 'totalClientes', 'totalReservas'));
    }

    public function frota()
    {
        $categorias = Categoria::all();
        $bicicletas = Bicicleta::with('categoria')
            ->when(request('categoria'), fn($q) => $q->where('categoria_id', request('categoria')))
            ->when(request('estado'), fn($q) => $q->where('estado', request('estado')))
            ->paginate(12);
        return view('public.frota', compact('bicicletas', 'categorias'));
    }

    public function reservar()
    {
        $bicicletas = Bicicleta::with('categoria')->where('estado', 'disponivel')->get();
        return view('public.reservar', compact('bicicletas'));
    }

    public function storeReserva(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'telefone' => 'required|string|max:20',
            'bicicleta_id' => 'required|exists:bicicletas,id',
            'data_inicio' => 'required|date|after_or_equal:today',
            'data_fim' => 'required|date|after:data_inicio',
            'tipo' => 'required|in:hora,dia'
        ]);

        $cliente = Cliente::firstOrCreate(
            ['email' => $validated['email']],
            ['nome' => $validated['nome'], 'telefone' => $validated['telefone']]
        );

        $bicicleta = Bicicleta::findOrFail($validated['bicicleta_id']);
        $inicio = \Carbon\Carbon::parse($validated['data_inicio']);
        $fim = \Carbon\Carbon::parse($validated['data_fim']);
        $valorTotal = $validated['tipo'] === 'hora'
            ? $inicio->diffInHours($fim) * $bicicleta->preco_hora
            : $inicio->diffInDays($fim) * $bicicleta->preco_dia;

        Reserva::create([
            'cliente_id' => $cliente->id,
            'bicicleta_id' => $validated['bicicleta_id'],
            'data_inicio' => $validated['data_inicio'],
            'data_fim' => $validated['data_fim'],
            'tipo' => $validated['tipo'],
            'estado' => 'pendente',
            'valor_total' => $valorTotal
        ]);

        return redirect()->route('home')->with('success', 'Reserva enviada com sucesso! Entraremos em contacto em breve.');
    }

    public function contacto()
    {
        return view('public.contacto');
    }

    public function sobre()
    {
        return view('public.sobre');
    }
}