@extends('layouts.admin')
@section('title', 'Editar Bicicleta')
@section('page-title', '✏️ Editar Bicicleta')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.bicicletas.update', $bicicleta->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nome *</label>
                    <input type="text" name="nome" value="{{ old('nome', $bicicleta->nome) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Número de Série *</label>
                    <input type="text" name="numero_serie" value="{{ old('numero_serie', $bicicleta->numero_serie) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Marca *</label>
                    <input type="text" name="marca" value="{{ old('marca', $bicicleta->marca) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Modelo *</label>
                    <input type="text" name="modelo" value="{{ old('modelo', $bicicleta->modelo) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Categoria *</label>
                    <select name="categoria_id" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                        @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ old('categoria_id', $bicicleta->categoria_id) == $cat->id ? 'selected' : '' }}>{{ $cat->icone }} {{ $cat->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Estado *</label>
                    <select name="estado" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                        <option value="disponivel" {{ $bicicleta->estado === 'disponivel' ? 'selected' : '' }}>✅ Disponível</option>
                        <option value="alugada" {{ $bicicleta->estado === 'alugada' ? 'selected' : '' }}>🔵 Alugada</option>
                        <option value="manutencao" {{ $bicicleta->estado === 'manutencao' ? 'selected' : '' }}>🔧 Em Manutenção</option>
                        <option value="inativa" {{ $bicicleta->estado === 'inativa' ? 'selected' : '' }}>⛔ Inativa</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Preço por Hora (€) *</label>
                    <input type="number" step="0.01" name="preco_hora" value="{{ old('preco_hora', $bicicleta->preco_hora) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Preço por Dia (€) *</label>
                    <input type="number" step="0.01" name="preco_dia" value="{{ old('preco_dia', $bicicleta->preco_dia) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Cor</label>
                    <input type="text" name="cor" value="{{ old('cor', $bicicleta->cor) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tamanho</label>
                    <select name="tamanho" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">
                        @foreach(['XS','S','M','L','XL'] as $tam)
                        <option value="{{ $tam }}" {{ old('tamanho', $bicicleta->tamanho) == $tam ? 'selected' : '' }}>{{ $tam }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Descrição</label>
                <textarea name="descricao" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">{{ old('descricao', $bicicleta->descricao) }}</textarea>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('admin.bicicletas.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Cancelar</a>
                <button type="submit" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium">Guardar Alterações</button>
            </div>
        </form>
    </div>
</div>
@endsection
