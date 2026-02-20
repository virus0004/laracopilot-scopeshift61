@extends('layouts.app')
@section('title', 'A Nossa Frota — Byclica')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-800">A Nossa Frota</h1>
        <p class="text-gray-500 mt-2">Escolha a bicicleta perfeita para a sua aventura</p>
    </div>
    <!-- Filtros -->
    <form method="GET" class="flex flex-wrap gap-4 mb-8 bg-white p-4 rounded-xl shadow-sm">
        <div class="flex-1 min-w-48">
            <select name="categoria" class="w-full border border-gray-300 rounded-lg px-4 py-2.5" onchange="this.form.submit()">
                <option value="">Todas as categorias</option>
                @foreach($categorias as $cat)
                <option value="{{ $cat->id }}" {{ request('categoria') == $cat->id ? 'selected' : '' }}>{{ $cat->icone }} {{ $cat->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-1 min-w-48">
            <select name="estado" class="w-full border border-gray-300 rounded-lg px-4 py-2.5" onchange="this.form.submit()">
                <option value="">Todos os estados</option>
                <option value="disponivel" {{ request('estado') === 'disponivel' ? 'selected' : '' }}>✅ Disponível</option>
                <option value="alugada" {{ request('estado') === 'alugada' ? 'selected' : '' }}>🔵 Alugada</option>
            </select>
        </div>
        <a href="{{ route('public.frota') }}" class="px-4 py-2.5 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">Limpar</a>
    </form>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($bicicletas as $bic)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all">
            <div class="bg-gradient-to-br from-green-100 to-emerald-50 h-48 flex items-center justify-center relative">
                <span class="text-7xl">🚲</span>
                <span class="absolute top-3 right-3 text-xs font-medium px-2 py-1 rounded-full {{ $bic->estado_badge }}">{{ ucfirst($bic->estado) }}</span>
            </div>
            <div class="p-6">
                <div class="mb-3">
                    <h3 class="font-bold text-gray-800 text-lg">{{ $bic->nome }}</h3>
                    <p class="text-gray-500 text-sm">{{ $bic->marca }} {{ $bic->modelo }} • {{ $bic->cor }} • {{ $bic->tamanho }}</p>
                    <span class="inline-block mt-1 text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full">{{ $bic->categoria->nome ?? '' }}</span>
                </div>
                @if($bic->descricao)
                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($bic->descricao, 80) }}</p>
                @endif
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-green-600 font-bold text-lg">€{{ number_format($bic->preco_hora, 2) }}</span><span class="text-gray-400 text-sm">/hora</span>
                        <br>
                        <span class="text-gray-600 font-medium">€{{ number_format($bic->preco_dia, 2) }}</span><span class="text-gray-400 text-sm">/dia</span>
                    </div>
                    @if($bic->estado === 'disponivel')
                    <a href="{{ route('public.reservar') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm font-medium">Reservar</a>
                    @else
                    <span class="text-gray-400 text-sm">Indisponível</span>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-16">
            <div class="text-6xl mb-4">🚲</div>
            <p class="text-gray-500 text-lg">Nenhuma bicicleta encontrada com os filtros selecionados.</p>
            <a href="{{ route('public.frota') }}" class="mt-4 inline-block text-green-600 hover:underline">Ver todas as bicicletas</a>
        </div>
        @endforelse
    </div>
    <div class="mt-8">{{ $bicicletas->withQueryString()->links() }}</div>
</div>
@endsection
