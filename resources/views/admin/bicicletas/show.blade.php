@extends('layouts.admin')
@section('title', $bicicleta->nome)
@section('page-title', '🚲 ' . $bicicleta->nome)
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-semibold text-gray-800 mb-4">Detalhes</h3>
        <dl class="space-y-3">
            <div><dt class="text-xs text-gray-500">Marca / Modelo</dt><dd class="font-medium">{{ $bicicleta->marca }} {{ $bicicleta->modelo }}</dd></div>
            <div><dt class="text-xs text-gray-500">Nº de Série</dt><dd class="font-medium">{{ $bicicleta->numero_serie }}</dd></div>
            <div><dt class="text-xs text-gray-500">Categoria</dt><dd class="font-medium">{{ $bicicleta->categoria->nome ?? '—' }}</dd></div>
            <div><dt class="text-xs text-gray-500">Cor / Tamanho</dt><dd class="font-medium">{{ $bicicleta->cor }} / {{ $bicicleta->tamanho }}</dd></div>
            <div><dt class="text-xs text-gray-500">Preço/Hora</dt><dd class="font-semibold text-green-600">€{{ number_format($bicicleta->preco_hora, 2) }}</dd></div>
            <div><dt class="text-xs text-gray-500">Preço/Dia</dt><dd class="font-semibold text-green-600">€{{ number_format($bicicleta->preco_dia, 2) }}</dd></div>
            <div><dt class="text-xs text-gray-500">Estado</dt><dd><span class="px-2 py-1 rounded-full text-xs font-medium {{ $bicicleta->estado_badge }}">{{ ucfirst($bicicleta->estado) }}</span></dd></div>
        </dl>
        <div class="mt-6 flex space-x-2">
            <a href="{{ route('admin.bicicletas.edit', $bicicleta->id) }}" class="flex-1 text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 text-sm font-medium">Editar</a>
            <a href="{{ route('admin.bicicletas.index') }}" class="flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-50 text-sm">Voltar</a>
        </div>
    </div>
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-semibold text-gray-800 mb-4">Histórico de Reservas ({{ $bicicleta->reservas->count() }})</h3>
        <div class="space-y-3">
            @forelse($bicicleta->reservas as $reserva)
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div>
                    <p class="font-medium text-gray-800">{{ $reserva->cliente->nome ?? 'N/A' }}</p>
                    <p class="text-xs text-gray-500">{{ $reserva->data_inicio->format('d/m/Y') }} → {{ $reserva->data_fim->format('d/m/Y') }}</p>
                </div>
                <div class="text-right">
                    <p class="font-semibold text-gray-800">€{{ number_format($reserva->valor_total, 2) }}</p>
                    <span class="text-xs {{ $reserva->estado_badge }} px-2 py-0.5 rounded-full">{{ ucfirst($reserva->estado) }}</span>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-center py-8">Nenhuma reserva ainda.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
