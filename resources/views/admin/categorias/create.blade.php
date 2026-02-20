@extends('layouts.admin')
@section('title', 'Nova Categoria')
@section('page-title', '+ Nova Categoria')
@section('content')
<div class="max-w-lg">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.categorias.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nome da Categoria *</label>
                <input type="text" name="nome" value="{{ old('nome') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500">
                @error('nome')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Ícone (emoji)</label>
                <input type="text" name="icone" value="{{ old('icone') }}" placeholder="🚲" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Descrição</label>
                <textarea name="descricao" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">{{ old('descricao') }}</textarea>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('admin.categorias.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Cancelar</a>
                <button type="submit" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium">Criar Categoria</button>
            </div>
        </form>
    </div>
</div>
@endsection
