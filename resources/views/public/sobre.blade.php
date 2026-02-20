@extends('layouts.app')
@section('title', 'Sobre Nós — Byclica')
@section('content')
<section class="bg-gradient-to-br from-green-600 to-green-800 text-white py-20">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="text-5xl mb-6">🚲</div>
        <h1 class="text-4xl font-bold mb-4">Sobre a Byclica</h1>
        <p class="text-green-100 text-xl">A promover a mobilidade sustentável em Portugal desde 2018</p>
    </div>
</section>
<div class="max-w-4xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">A Nossa Missão</h2>
            <p class="text-gray-600 leading-relaxed mb-4">A Byclica nasceu da paixão pela bicicleta e pela sustentabilidade. A nossa missão é tornar o aluguer de bicicletas acessível, simples e agradável para todos os portugueses e turistas.</p>
            <p class="text-gray-600 leading-relaxed">Acreditamos que a bicicleta é o futuro da mobilidade urbana. Por isso, investimos constantemente na qualidade da nossa frota e na experiência dos nossos clientes.</p>
        </div>
        <div class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl p-8 text-center">
            <div class="text-6xl mb-4">🌿</div>
            <h3 class="font-bold text-gray-800 text-xl mb-2">Compromisso Verde</h3>
            <p class="text-gray-600">Cada bicicleta alugada é uma viagem sem emissões de CO₂. Juntos fazemos a diferença.</p>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 text-center">
            <div class="text-4xl font-bold text-green-600 mb-2">2018</div>
            <div class="text-gray-600">Ano de fundação</div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 text-center">
            <div class="text-4xl font-bold text-green-600 mb-2">500+</div>
            <div class="text-gray-600">Clientes satisfeitos</div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 text-center">
            <div class="text-4xl font-bold text-green-600 mb-2">50+</div>
            <div class="text-gray-600">Bicicletas na frota</div>
        </div>
    </div>
    <div class="text-center">
        <a href="{{ route('public.reservar') }}" class="bg-green-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-green-700 transition-colors">🗓️ Fazer uma Reserva</a>
    </div>
</div>
@endsection
