@extends('layouts.admin')
@section('title', 'Pagamentos')
@section('page-title', '💳 Gestão de Pagamentos')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500">{{ $pagamentos->total() }} pagamentos registados</p>
    <a href="{{ route('admin.pagamentos.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-medium">+ Registar Pagamento</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">#</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Cliente</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Valor</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Método</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Data</th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($pagamentos as $pag)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-gray-500 text-sm">#{{ $pag->id }}</td>
                <td class="px-6 py-4 font-medium text-gray-800">{{ $pag->reserva->cliente->nome ?? 'N/A' }}</td>
                <td class="px-6 py-4 font-bold text-gray-800">€{{ number_format($pag->valor, 2) }}</td>
                <td class="px-6 py-4 text-gray-600">{{ ucfirst($pag->metodo) }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $pag->estado === 'pago' ? 'bg-green-100 text-green-800' : ($pag->estado === 'reembolsado' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">{{ ucfirst($pag->estado) }}</span>
                </td>
                <td class="px-6 py-4 text-gray-600 text-sm">{{ $pag->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.pagamentos.show', $pag->id) }}" class="text-blue-600 hover:underline text-sm">Ver</a>
                    <form action="{{ route('admin.pagamentos.destroy', $pag->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Eliminar pagamento?')" class="text-red-600 hover:underline text-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-6 py-12 text-center text-gray-500">Nenhum pagamento registado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $pagamentos->links() }}</div>
@endsection
