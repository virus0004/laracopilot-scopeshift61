@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('content')

<!-- KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Bicicletas</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalBicicletas }}</p>
                <p class="text-xs text-green-600 mt-2">{{ $bicicletasDisponiveis }} disponíveis</p>
            </div>
            <div class="text-4xl">🚲</div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Reservas Ativas</p>
                <p class="text-3xl font-bold text-green-600 mt-1">{{ $reservasAtivas }}</p>
                <p class="text-xs text-yellow-600 mt-2">{{ $reservasPendentes }} pendentes</p>
            </div>
            <div class="text-4xl">📅</div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Clientes</p>
                <p class="text-3xl font-bold text-blue-600 mt-1">{{ $totalClientes }}</p>
                <p class="text-xs text-gray-500 mt-2">clientes registados</p>
            </div>
            <div class="text-4xl">👥</div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">Receita Total</p>
                <p class="text-3xl font-bold text-purple-600 mt-1">€{{ number_format($totalReceita, 2) }}</p>
                <p class="text-xs text-green-600 mt-2">€{{ number_format($receitaMes, 2) }} este mês</p>
            </div>
            <div class="text-4xl">💰</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Estado das Bicicletas -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Estado da Frota</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="flex items-center"><span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>Disponível</span>
                <span class="font-bold text-green-600">{{ $bicicletasDisponiveis }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="flex items-center"><span class="w-3 h-3 rounded-full bg-blue-500 mr-2"></span>Alugada</span>
                <span class="font-bold text-blue-600">{{ $bicicletasAlugadas }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="flex items-center"><span class="w-3 h-3 rounded-full bg-gray-400 mr-2"></span>Total</span>
                <span class="font-bold">{{ $totalBicicletas }}</span>
            </div>
        </div>
        <div class="mt-4 pt-4 border-t">
            <a href="{{ route('admin.bicicletas.index') }}" class="text-green-600 text-sm font-medium hover:underline">Ver todas as bicicletas →</a>
        </div>
    </div>

    <!-- Bicicletas Mais Populares -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 lg:col-span-2">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">🏆 Bicicletas Mais Reservadas</h3>
        <div class="space-y-3">
            @foreach($bicicletasPopulares as $bic)
            <div class="flex items-center justify-between py-2 border-b last:border-0">
                <div>
                    <p class="font-medium text-gray-800">{{ $bic->nome }}</p>
                    <p class="text-xs text-gray-500">{{ $bic->marca }} {{ $bic->modelo }}</p>
                </div>
                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">{{ $bic->reservas_count }} reservas</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Reservas Recentes -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">📋 Reservas Recentes</h3>
        <a href="{{ route('admin.reservas.index') }}" class="text-green-600 text-sm font-medium hover:underline">Ver todas →</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Cliente</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Bicicleta</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Período</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Valor</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Estado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($reservasRecentes as $reserva)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $reserva->cliente->nome ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $reserva->bicicleta->nome ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-gray-600 text-sm">
                        {{ $reserva->data_inicio->format('d/m/Y') }} → {{ $reserva->data_fim->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-800">€{{ number_format($reserva->valor_total, 2) }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-xs font-medium {{ $reserva->estado_badge }}">{{ ucfirst($reserva->estado) }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
