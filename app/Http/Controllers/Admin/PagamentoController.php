<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pagamento;
use App\Models\Reserva;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $pagamentos = Pagamento::with(['reserva.cliente'])->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.pagamentos.index', compact('pagamentos'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $reservas = Reserva::with('cliente')->where('estado', '!=', 'cancelada')->orderBy('created_at', 'desc')->get();
        return view('admin.pagamentos.create', compact('reservas'));
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $validated = $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'valor' => 'required|numeric|min:0',
            'metodo' => 'required|in:dinheiro,cartao,transferencia,mbway',
            'estado' => 'required|in:pendente,pago,reembolsado',
            'referencia' => 'nullable|string|max:100',
            'notas' => 'nullable|string'
        ]);
        Pagamento::create($validated);
        return redirect()->route('admin.pagamentos.index')->with('success', 'Pagamento registado com sucesso!');
    }

    public function show($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $pagamento = Pagamento::with(['reserva.cliente', 'reserva.bicicleta'])->findOrFail($id);
        return view('admin.pagamentos.show', compact('pagamento'));
    }

    public function updateEstado(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $pagamento = Pagamento::findOrFail($id);
        $request->validate(['estado' => 'required|in:pendente,pago,reembolsado']);
        $pagamento->update(['estado' => $request->estado]);
        return redirect()->route('admin.pagamentos.index')->with('success', 'Estado do pagamento atualizado!');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        Pagamento::findOrFail($id)->delete();
        return redirect()->route('admin.pagamentos.index')->with('success', 'Pagamento removido!');
    }
}