@extends('layouts.app')
@section('title', 'Byclica — Aluguer de Bicicletas em Portugal')
@section('content')

<!-- Hero -->
<section class="relative bg-gradient-to-br from-green-600 to-green-800 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 text-9xl">🚲</div>
        <div class="absolute bottom-10 right-10 text-9xl">🌿</div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center">
        <div class="text-6xl mb-6">🚲</div>
        <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">Pedale com Liberdade</h1>
        <p class="text-xl md:text-2xl text-green-100 mb-10 max-w-2xl mx-auto">Alugue bicicletas de qualidade para explorar a cidade, a natureza e as ciclovias de Portugal de forma sustentável.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('public.reservar') }}" class="bg-white text-green-700 font-bold px-8 py-4 rounded-xl text-lg hover:bg-green-50 transition-all shadow-lg">🗓️ Fazer Reserva</a>
            <a href="{{ route('public.frota') }}" class="border-2 border-white text-white font-bold px-8 py-4 rounded-xl text-lg hover:bg-white hover:text-green-700 transition-all">🚲 Ver a Frota</a>
        </div>
        <div class="mt-16 grid grid-cols-3 gap-8 max-w-md mx-auto">
            <div class="text-center">
                <div class="text-3xl font-bold">{{ $totalBicicletas }}+</div>
                <div class="text-green-200 text-sm">Bicicletas</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold">{{ $totalClientes }}+</div>
                <div class="text-green-200 text-sm">Clientes</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold">{{ $totalReservas }}+</div>
                <div class="text-green-200 text-sm">Reservas</div>
            </div>
        </div>
    </div>
</section>

<!-- Categorias -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Tipos de Bicicleta</h2>
            <p class="text-gray-500 mt-2">Para cada aventura, temos a bicicleta certa</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($categorias as $cat)
            <a href="{{ route('public.frota', ['categoria' => $cat->id]) }}" class="bg-gray-50 rounded-xl p-6 text-center hover:bg-green-50 hover:shadow-md transition-all group">
                <div class="text-4xl mb-3">{{ $cat->icone ?? '🚲' }}</div>
                <div class="font-semibold text-gray-700 group-hover:text-green-700">{{ $cat->nome }}</div>
                <div class="text-xs text-gray-400 mt-1">{{ $cat->bicicletas_count }} bikes</div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Bicicletas Disponíveis -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Disponíveis Agora</h2>
                <p class="text-gray-500 mt-1">Prontas para pedalar</p>
            </div>
            <a href="{{ route('public.frota') }}" class="text-green-600 font-medium hover:underline">Ver todas →</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($bicicletas as $bic)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all">
                <div class="bg-gradient-to-br from-green-100 to-green-50 h-48 flex items-center justify-center">
                    <span class="text-8xl">🚲</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg">{{ $bic->nome }}</h3>
                            <p class="text-gray-500 text-sm">{{ $bic->marca }} {{ $bic->modelo }}</p>
                        </div>
                        <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full font-medium">Disponível</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>
                            <div class="text-green-600 font-bold">€{{ number_format($bic->preco_hora, 2) }}/hora</div>
                            <div class="text-gray-500 text-sm">€{{ number_format($bic->preco_dia, 2) }}/dia</div>
                        </div>
                        <a href="{{ route('public.reservar') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm font-medium">Reservar</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Porquê Byclica -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Porquê escolher a Byclica?</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl mb-4">🛡️</div>
                <h3 class="font-bold text-gray-800 mb-2">Bicicletas Seguras</h3>
                <p class="text-gray-500 text-sm">Todas as bicicletas são revisadas e mantidas regularmente.</p>
            </div>
            <div class="text-center">
                <div class="text-4xl mb-4">💰</div>
                <h3 class="font-bold text-gray-800 mb-2">Preços Acessíveis</h3>
                <p class="text-gray-500 text-sm">Preços competitivos por hora ou dia, sem taxas escondidas.</p>
            </div>
            <div class="text-center">
                <div class="text-4xl mb-4">📱</div>
                <h3 class="font-bold text-gray-800 mb-2">Reserva Fácil</h3>
                <p class="text-gray-500 text-sm">Reserve online em minutos, confirme por email.</p>
            </div>
            <div class="text-center">
                <div class="text-4xl mb-4">🌿</div>
                <h3 class="font-bold text-gray-800 mb-2">Sustentável</h3>
                <p class="text-gray-500 text-sm">Promovemos a mobilidade verde e sustentável.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-gradient-to-r from-green-600 to-green-800 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Pronto para pedalar?</h2>
        <p class="text-green-100 mb-8">Reserve a sua bicicleta hoje e explore Portugal de forma diferente.</p>
        <a href="{{ route('public.reservar') }}" class="bg-white text-green-700 font-bold px-8 py-4 rounded-xl text-lg hover:bg-green-50 transition-all shadow-lg">🗓️ Fazer Reserva Agora</a>
    </div>
</section>
@endsection
