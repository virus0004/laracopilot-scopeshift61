@extends('layouts.admin')
@section('title', 'Novo Pagamento')
@section('page-title', '+ Registar Pagamento')
@section('content')
<div class="max-w-lg">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.pagamentos.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Reserva *</label>
                <select name="reserva_id" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                    <option value="">Selecionar reserva...</option>
                    @foreach($reservas as $res)
                    <option value="{{ $res->id }}" {{ old('reserva_id') == $res->id ? 'selected' : '' }}>
                        #{{ $res->id }} — {{ $res->cliente->nome ?? 'N/A' }} (€{{ number_format($res->valor_total, 2) }})
                    </option>
                    @endforeach
                </select>
                @error('reserva_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Valor (€) *</label>
                <input type="number" step="0.01" name="valor" value="{{ old('valor') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Método de Pagamento *</label>
                <select name="metodo" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5">
                    <option value="dinheiro">💵 Dinheiro</option>
                    <option value="cartao">💳 Cartão</option>
                    <option value="transferencia">🏦 Transferência</option>
                    <option value="mbway">📱 MBWay</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Estado *</label>
                <select name="estado" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5">
                    <option value="pago">✅ Pago</option>
                    <option value="pendente">⏳ Pendente</option>
                    <option value="reembolsado">↩️ Reembolsado</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Referência</label>
                <input type="text" name="referencia" value="{{ old('referencia') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Notas</label>
                <textarea name="notas" rows="2" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">{{ old('notas') }}</textarea>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('admin.pagamentos.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Cancelar</a>
                <button type="submit" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium">Registar</button>
            </div>
        </form>
    </div>
</div>
@endsection
