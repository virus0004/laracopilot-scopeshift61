@extends('layouts.admin')
@section('title', $cliente->nome)
@section('page-title', '👤 ' . $cliente->nome)
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-semibold text-gray-800 mb-4">Dados Pessoais</h3>
        <dl class="space-y-3">
            <div><dt class="text-xs text-gray-500">Email</dt><dd class="font-medium">{{ $cliente->email }}</dd></div>
            <div><dt class="text-xs text-gray-500">Telefone</dt><dd class="font-medium">{{ $cliente->telefone }}</dd></div>
            <div><dt class="text-xs text-gray-500">NIF</dt><dd class="font-medium">{{ $cliente->nif ?? '—' }}</dd></div>
            <div><dt class="text-xs text-gray-500">Cidade</dt><dd class="font-medium">{{ $cliente->cidade ?? '—' }}</dd></div>
            <div><dt class="text-xs text-gray-500">Morada</dt><dd class="text-gray-700">{{ $cliente->morada ?? '—' }}</dd></div>
            <div><dt class="text-xs text-gray-500">Nascimento</dt><dd class="font-medium">{{ $cliente->data_nascimento?->format('d/m/Y') ?? '—' }}</dd></div>
            <div><dt class="text-xs text-gray-500">Cliente desde</dt><dd class="font-medium">{{ $cliente->created_at->format('d/m/Y') }}</dd></div>
        </dl>
        <div class="mt-6 flex space-x-2">
            <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="flex-1 text-center bg-green-600 text-white py-2 rounded-lg text-sm font-medium">Editar</a>
            <a href="{{ route('admin.clientes.index') }}" class="flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg text-sm">Voltar</a>
        </div>
    </div>
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-semibold text-gray-800 mb-4">Histórico de Reservas ({{ $cliente->reservas->count() }})</h3>
        <div class="space-y-3">
            @forelse($cliente->reservas as $reserva)
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <div>
                    <p class="font-medium">{{ $reserva->bicicleta->nome ?? 'N/A' }}</p>
                    <p class="text-xs text-gray-500">{{ $reserva->data_inicio->format('d/m/Y') }} → {{ $reserva->data_fim->format('d/m/Y') }}</p>
                </div>
                <div class="text-right">
                    <p class="font-semibold">€{{ number_format($reserva->valor_total, 2) }}</p>
                    <span class="text-xs {{ $reserva->estado_badge }} px-2 py-0.5 rounded-full">{{ ucfirst($reserva->estado) }}</span>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-center py-8">Sem reservas ainda.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
