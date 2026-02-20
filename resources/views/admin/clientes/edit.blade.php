@extends('layouts.admin')
@section('title', 'Editar Cliente')
@section('page-title', '✏️ Editar Cliente')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.clientes.update', $cliente->id) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nome Completo *</label>
                    <input type="text" name="nome" value="{{ old('nome', $cliente->nome) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                    <input type="email" name="email" value="{{ old('email', $cliente->email) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Telefone *</label>
                    <input type="text" name="telefone" value="{{ old('telefone', $cliente->telefone) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">NIF</label>
                    <input type="text" name="nif" value="{{ old('nif', $cliente->nif) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Cidade</label>
                    <input type="text" name="cidade" value="{{ old('cidade', $cliente->cidade) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" value="{{ old('data_nascimento', $cliente->data_nascimento?->format('Y-m-d')) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Morada</label>
                    <textarea name="morada" rows="2" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">{{ old('morada', $cliente->morada) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Notas</label>
                    <textarea name="notas" rows="2" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">{{ old('notas', $cliente->notas) }}</textarea>
                </div>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('admin.clientes.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Cancelar</a>
                <button type="submit" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
