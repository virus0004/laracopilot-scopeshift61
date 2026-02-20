@extends('layouts.app')
@section('title', 'Contacto — Byclica')
@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-800">Contacte-nos</h1>
        <p class="text-gray-500 mt-2">Estamos aqui para ajudar</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center space-x-4">
                    <div class="text-3xl">📍</div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Morada</h3>
                        <p class="text-gray-600">Rua das Bicicletas, 123<br>1000-001 Lisboa, Portugal</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center space-x-4">
                    <div class="text-3xl">📞</div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Telefone</h3>
                        <p class="text-gray-600">+351 210 000 000</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center space-x-4">
                    <div class="text-3xl">📧</div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Email</h3>
                        <p class="text-gray-600">info@byclica.com</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center space-x-4">
                    <div class="text-3xl">🕐</div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Horários</h3>
                        <p class="text-gray-600">Seg-Sex: 8h-19h<br>Sáb: 9h-18h | Dom: 10h-17h</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Enviar Mensagem</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nome</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2.5" placeholder="O seu nome">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" class="w-full border border-gray-300 rounded-lg px-4 py-2.5" placeholder="email@exemplo.com">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Mensagem</label>
                    <textarea rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2.5" placeholder="A sua mensagem..."></textarea>
                </div>
                <button class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">Enviar Mensagem</button>
            </div>
        </div>
    </div>
</div>
@endsection
