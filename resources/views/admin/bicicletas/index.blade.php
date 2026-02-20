@extends('layouts.admin')
@section('title', 'Bicicletas')
@section('page-title', '🚲 Gestão de Bicicletas')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500">{{ $bicicletas->total() }} bicicletas na frota</p>
    <a href="{{ route('admin.bicicletas.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors font-medium">+ Adicionar Bicicleta</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Bicicleta</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Categoria</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Preço/Hora</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Preço/Dia</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Estado</th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($bicicletas as $bicicleta)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="font-medium text-gray-800">{{ $bicicleta->nome }}</div>
                    <div class="text-xs text-gray-500">{{ $bicicleta->marca }} {{ $bicicleta->modelo }} • {{ $bicicleta->cor }}</div>
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $bicicleta->categoria->nome ?? '—' }}</td>
                <td class="px-6 py-4 font-medium">€{{ number_format($bicicleta->preco_hora, 2) }}</td>
                <td class="px-6 py-4 font-medium">€{{ number_format($bicicleta->preco_dia, 2) }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $bicicleta->estado_badge }}">{{ ucfirst($bicicleta->estado) }}</span>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.bicicletas.show', $bicicleta->id) }}" class="text-blue-600 hover:underline text-sm">Ver</a>
                    <a href="{{ route('admin.bicicletas.edit', $bicicleta->id) }}" class="text-green-600 hover:underline text-sm">Editar</a>
                    <form action="{{ route('admin.bicicletas.destroy', $bicicleta->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Remover esta bicicleta?')" class="text-red-600 hover:underline text-sm">Remover</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-6 py-12 text-center text-gray-500">Nenhuma bicicleta registada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $bicicletas->links() }}</div>
@endsection
