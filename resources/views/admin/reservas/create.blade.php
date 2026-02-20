@extends('layouts.admin')
@section('title', 'Nova Reserva')
@section('page-title', '+ Nova Reserva')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.reservas.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Cliente *</label>
                    <select name="cliente_id" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                        <option value="">Selecionar cliente...</option>
                        @foreach($clientes as $cli)
                        <option value="{{ $cli->id }}" {{ old('cliente_id') == $cli->id ? 'selected' : '' }}>{{ $cli->nome }} — {{ $cli->telefone }}</option>
                        @endforeach
                    </select>
                    @error('cliente_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Bicicleta *</label>
                    <select name="bicicleta_id" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                        <option value="">Selecionar bicicleta...</option>
                        @foreach($bicicletas as $bic)
                        <option value="{{ $bic->id }}" {{ old('bicicleta_id') == $bic->id ? 'selected' : '' }}>{{ $bic->nome }} (€{{ $bic->preco_dia }}/dia)</option>
                        @endforeach
                    </select>
                    @error('bicicleta_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Data Início *</label>
                    <input type="datetime-local" name="data_inicio" value="{{ old('data_inicio') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Data Fim *</label>
                    <input type="datetime-local" name="data_fim" value="{{ old('data_fim') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tipo *</label>
                    <select name="tipo" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                        <option value="dia" {{ old('tipo') == 'dia' ? 'selected' : '' }}>Por Dia</option>
                        <option value="hora" {{ old('tipo') == 'hora' ? 'selected' : '' }}>Por Hora</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Estado *</label>
                    <select name="estado" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                        <option value="pendente">⏳ Pendente</option>
                        <option value="ativa">✅ Ativa</option>
                        <option value="concluida">🏁 Concluída</option>
                        <option value="cancelada">❌ Cancelada</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Notas</label>
                <textarea name="notas" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">{{ old('notas') }}</textarea>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('admin.reservas.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Cancelar</a>
                <button type="submit" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium">Criar Reserva</button>
            </div>
        </form>
    </div>
</div>
@endsection
