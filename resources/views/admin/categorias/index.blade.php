@extends('layouts.admin')
@section('title', 'Categorias')
@section('page-title', '🏷️ Categorias de Bicicletas')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500">{{ $categorias->total() }} categorias</p>
    <a href="{{ route('admin.categorias.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-medium">+ Nova Categoria</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Categoria</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Descrição</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Bicicletas</th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($categorias as $categoria)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-2">
                        <span class="text-2xl">{{ $categoria->icone ?? '🚲' }}</span>
                        <span class="font-medium text-gray-800">{{ $categoria->nome }}</span>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $categoria->descricao ?? '—' }}</td>
                <td class="px-6 py-4"><span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">{{ $categoria->bicicletas_count }}</span></td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.categorias.edit', $categoria->id) }}" class="text-green-600 hover:underline text-sm">Editar</a>
                    <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Remover categoria?')" class="text-red-600 hover:underline text-sm">Remover</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-12 text-center text-gray-500">Nenhuma categoria criada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $categorias->links() }}</div>
@endsection
