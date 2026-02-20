@extends('layouts.admin')
@section('title', 'Pagamento #' . $pagamento->id)
@section('page-title', '💳 Pagamento #' . $pagamento->id)
@section('content')
<div class="max-w-lg">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <dl class="space-y-4">
            <div class="flex justify-between"><dt class="text-gray-500">Cliente</dt><dd class="font-medium">{{ $pagamento->reserva->cliente->nome ?? 'N/A' }}</dd></div>
            <div class="flex justify-between"><dt class="text-gray-500">Bicicleta</dt><dd class="font-medium">{{ $pagamento->reserva->bicicleta->nome ?? 'N/A' }}</dd></div>
            <div class="flex justify-between"><dt class="text-gray-500">Valor</dt><dd class="font-bold text-green-600 text-xl">€{{ number_format($pagamento->valor, 2) }}</dd></div>
            <div class="flex justify-between"><dt class="text-gray-500">Método</dt><dd class="font-medium">{{ ucfirst($pagamento->metodo) }}</dd></div>
            <div class="flex justify-between"><dt class="text-gray-500">Estado</dt><dd><span class="px-2 py-1 rounded-full text-xs font-medium {{ $pagamento->estado === 'pago' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">{{ ucfirst($pagamento->estado) }}</span></dd></div>
            <div class="flex justify-between"><dt class="text-gray-500">Referência</dt><dd>{{ $pagamento->referencia ?? '—' }}</dd></div>
            <div class="flex justify-between"><dt class="text-gray-500">Data</dt><dd>{{ $pagamento->created_at->format('d/m/Y H:i') }}</dd></div>
        </dl>
        <div class="mt-6 pt-6 border-t">
            <form action="{{ route('admin.pagamentos.estado', $pagamento->id) }}" method="POST" class="flex gap-3">
                @csrf @method('PUT')
                <select name="estado" class="flex-1 border border-gray-300 rounded-lg px-3 py-2">
                    <option value="pago" {{ $pagamento->estado === 'pago' ? 'selected' : '' }}>✅ Pago</option>
                    <option value="pendente" {{ $pagamento->estado === 'pendente' ? 'selected' : '' }}>⏳ Pendente</option>
                    <option value="reembolsado" {{ $pagamento->estado === 'reembolsado' ? 'selected' : '' }}>↩️ Reembolsado</option>
                </select>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm font-medium">Atualizar</button>
            </form>
        </div>
        <a href="{{ route('admin.pagamentos.index') }}" class="block mt-3 text-center text-gray-600 hover:underline text-sm">← Voltar aos Pagamentos</a>
    </div>
</div>
@endsection
