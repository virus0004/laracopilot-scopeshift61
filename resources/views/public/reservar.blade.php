@extends('layouts.app')
@section('title', 'Fazer Reserva — Byclica')
@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="text-center mb-10">
        <div class="text-5xl mb-4">🗓️</div>
        <h1 class="text-4xl font-bold text-gray-800">Fazer Reserva</h1>
        <p class="text-gray-500 mt-2">Preencha o formulário e entraremos em contacto para confirmar</p>
    </div>
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-4 rounded-xl mb-6 text-center">
        <div class="text-2xl mb-2">✅</div>
        <p class="font-semibold">{{ session('success') }}</p>
    </div>
    @endif
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('public.reservar.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nome Completo *</label>
                    <input type="text" name="nome" value="{{ old('nome') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 @error('nome') border-red-500 @enderror">
                    @error('nome')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Telefone *</label>
                    <input type="text" name="telefone" value="{{ old('telefone') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 @error('email') border-red-500 @enderror">
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Bicicleta *</label>
                    <select name="bicicleta_id" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                        <option value="">Selecionar bicicleta...</option>
                        @foreach($bicicletas as $bic)
                        <option value="{{ $bic->id }}" {{ old('bicicleta_id') == $bic->id ? 'selected' : '' }}>{{ $bic->nome }} — {{ $bic->marca }} (€{{ number_format($bic->preco_dia, 2) }}/dia)</option>
                        @endforeach
                    </select>
                    @error('bicicleta_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Data de Início *</label>
                    <input type="datetime-local" name="data_inicio" value="{{ old('data_inicio') }}" required min="{{ now()->format('Y-m-d\TH:i') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Data de Fim *</label>
                    <input type="datetime-local" name="data_fim" value="{{ old('data_fim') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tipo de Aluguer *</label>
                    <div class="flex gap-4">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="tipo" value="dia" {{ old('tipo', 'dia') === 'dia' ? 'checked' : '' }} class="text-green-600">
                            <span class="font-medium">📅 Por Dia</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="tipo" value="hora" {{ old('tipo') === 'hora' ? 'checked' : '' }} class="text-green-600">
                            <span class="font-medium">⏰ Por Hora</span>
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-xl font-bold text-lg hover:bg-green-700 transition-colors mt-4">🗓️ Submeter Reserva</button>
        </form>
    </div>
    <div class="mt-6 bg-green-50 border border-green-200 rounded-xl p-4 text-sm text-green-800">
        <p class="font-semibold mb-1">ℹ️ Como funciona:</p>
        <ol class="list-decimal list-inside space-y-1">
            <li>Preencha o formulário acima</li>
            <li>Receberá confirmação por email em 24h</li>
            <li>Dirija-se à loja na data marcada</li>
            <li>Pague na recolha e pedale!</li>
        </ol>
    </div>
</div>
@endsection
