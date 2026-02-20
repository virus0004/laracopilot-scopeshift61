@extends('layouts.admin')
@section('title', 'Reserva #' . $reserva->id)
@section('page-title', '📅 Reserva #' . $reserva->id)
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-semibold text-gray-800 mb-4">Detalhes da Reserva</h3>
        <dl class="space-y-3">
            <div><dt class="text-xs text-gray-500">Cliente</dt><dd class="font-medium">{{ $reserva->cliente->nome ?? 'N/A' }}</dd></div>
            <div><dt class="text-xs text-gray-500">Bicicleta</dt><dd class="font-medium">{{ $reserva->bicicleta->nome ?? 'N/A' }}</dd></div>
            <div><dt class="text-xs text-gray-500">Período</dt><dd class="font-medium">{{ $reserva->data_inicio->format('d/m/Y H:i') }} → {{ $reserva->data_fim->format('d/m/Y H:i') }}</dd></div>
            <div><dt class="text-xs text-gray-500">Tipo</dt><dd class="font-medium">Por {{ $reserva->tipo }}</dd></div>
            <div><dt class="text-xs text-gray-500">Valor Total</dt><dd class="font-bold text-green-600 text-lg">€{{ number_format($reserva->valor_total, 2) }}</dd></div>
            <div><dt class="text-xs text-gray-500">Estado</dt><dd><span class="px-2 py-1 rounded-full text-xs font-medium {{ $reserva->estado_badge }}">{{ ucfirst($reserva->estado) }}</span></dd></div>
            @if($reserva->notas)<div><dt class="text-xs text-gray-500">Notas</dt><dd class="text-gray-700">{{ $reserva->notas }}</dd></div>@endif
        </dl>
        <div class="mt-6 flex space-x-2">
            <a href="{{ route('admin.reservas.edit', $reserva->id) }}" class="flex-1 text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 text-sm font-medium">Editar</a>
            <a href="{{ route('admin.reservas.index') }}" class="flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg text-sm">Voltar</a>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-semibold text-gray-800 mb-4">Pagamentos ({{ $reserva->pagamentos->count() }})</h3>
        @forelse($reserva->pagamentos as $pag)
        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg mb-2">
            <div>
                <p class="font-medium">€{{ number_format($pag->valor, 2) }}</p>
                <p class="text-xs text-gray-500">{{ ucfirst($pag->metodo) }} • {{ $pag->created_at->format('d/m/Y') }}</p>
            </div>
            <span class="text-xs px-2 py-1 rounded-full {{ $pag->estado === 'pago' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">{{ ucfirst($pag->estado) }}</span>
        </div>
        @empty
        <p class="text-gray-500 text-center py-8">Sem pagamentos registados.</p>
        @endforelse
    </div>
</div>
@endsection
