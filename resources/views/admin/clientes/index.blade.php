@extends('layouts.admin')
@section('title', 'Clientes')
@section('page-title', '👥 Gestão de Clientes')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500">{{ $clientes->total() }} clientes registados</p>
    <a href="{{ route('admin.clientes.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-medium">+ Novo Cliente</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nome</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Telefone</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Cidade</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Reservas</th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($clientes as $cliente)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium text-gray-800">{{ $cliente->nome }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $cliente->email }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $cliente->telefone }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $cliente->cidade ?? '—' }}</td>
                <td class="px-6 py-4"><span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">{{ $cliente->reservas_count }}</span></td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.clientes.show', $cliente->id) }}" class="text-blue-600 hover:underline text-sm">Ver</a>
                    <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="text-green-600 hover:underline text-sm">Editar</a>
                    <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Remover cliente?')" class="text-red-600 hover:underline text-sm">Remover</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-6 py-12 text-center text-gray-500">Nenhum cliente registado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $clientes->links() }}</div>
@endsection
