<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bicicleta;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Pagamento;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $totalBicicletas = Bicicleta::count();
        $bicicletasDisponiveis = Bicicleta::where('estado', 'disponivel')->count();
        $bicicletasAlugadas = Bicicleta::where('estado', 'alugada')->count();
        $totalClientes = Cliente::count();
        $totalReservas = Reserva::count();
        $reservasAtivas = Reserva::where('estado', 'ativa')->count();
        $reservasPendentes = Reserva::where('estado', 'pendente')->count();
        $totalReceita = Pagamento::where('estado', 'pago')->sum('valor');
        $receitaMes = Pagamento::where('estado', 'pago')
            ->whereMonth('created_at', now()->month)
            ->sum('valor');

        $reservasRecentes = Reserva::with(['cliente', 'bicicleta'])
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        $bicicletasPopulares = Bicicleta::withCount('reservas')
            ->orderBy('reservas_count', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBicicletas', 'bicicletasDisponiveis', 'bicicletasAlugadas',
            'totalClientes', 'totalReservas', 'reservasAtivas', 'reservasPendentes',
            'totalReceita', 'receitaMes', 'reservasRecentes', 'bicicletasPopulares'
        ));
    }
}