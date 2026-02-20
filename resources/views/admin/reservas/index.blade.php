@extends('layouts.admin')
@section('title', 'Reservas')
@section('page-title', '📅 Gestão de Reservas')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500">{{ $reservas->total() }} reservas no total</p>
    <a href="{{ route('admin.reservas.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-medium">+ Nova Reserva</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">#</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Cliente</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Bicicleta</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Período</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Valor</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Estado</th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($reservas as $reserva)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-gray-500 text-sm">#{{ $reserva->id }}</td>
                <td class="px-6 py-4 font-medium text-gray-800">{{ $reserva->cliente->nome ?? 'N/A' }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $reserva->bicicleta->nome ?? 'N/A' }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">
                    {{ $reserva->data_inicio->format('d/m/Y') }}<br>
                    <span class="text-gray-400">→ {{ $reserva->data_fim->format('d/m/Y') }}</span>
                </td>
                <td class="px-6 py-4 font-semibold">€{{ number_format($reserva->valor_total, 2) }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $reserva->estado_badge }}">{{ ucfirst($reserva->estado) }}</span>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.reservas.show', $reserva->id) }}" class="text-blue-600 hover:underline text-sm">Ver</a>
                    <a href="{{ route('admin.reservas.edit', $reserva->id) }}" class="text-green-600 hover:underline text-sm">Editar</a>
                    <form action="{{ route('admin.reservas.destroy', $reserva->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Eliminar reserva?')" class="text-red-600 hover:underline text-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-6 py-12 text-center text-gray-500">Nenhuma reserva encontrada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $reservas->links() }}</div>
@endsection
