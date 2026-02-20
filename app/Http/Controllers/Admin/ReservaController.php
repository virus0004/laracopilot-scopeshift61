<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Bicicleta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $reservas = Reserva::with(['cliente', 'bicicleta'])->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.reservas.index', compact('reservas'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $clientes = Cliente::orderBy('nome')->get();
        $bicicletas = Bicicleta::where('estado', 'disponivel')->orderBy('nome')->get();
        return view('admin.reservas.create', compact('clientes', 'bicicletas'));
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'bicicleta_id' => 'required|exists:bicicletas,id',
            'data_inicio' => 'required|date|after_or_equal:today',
            'data_fim' => 'required|date|after:data_inicio',
            'tipo' => 'required|in:hora,dia',
            'estado' => 'required|in:pendente,ativa,concluida,cancelada',
            'notas' => 'nullable|string'
        ]);

        $bicicleta = Bicicleta::findOrFail($validated['bicicleta_id']);
        $inicio = \Carbon\Carbon::parse($validated['data_inicio']);
        $fim = \Carbon\Carbon::parse($validated['data_fim']);

        if ($validated['tipo'] === 'hora') {
            $horas = $inicio->diffInHours($fim);
            $validated['valor_total'] = $horas * $bicicleta->preco_hora;
        } else {
            $dias = $inicio->diffInDays($fim);
            $validated['valor_total'] = $dias * $bicicleta->preco_dia;
        }

        Reserva::create($validated);

        if ($validated['estado'] === 'ativa') {
            $bicicleta->update(['estado' => 'alugada']);
        }

        return redirect()->route('admin.reservas.index')->with('success', 'Reserva criada com sucesso!');
    }

    public function show($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $reserva = Reserva::with(['cliente', 'bicicleta', 'pagamentos'])->findOrFail($id);
        return view('admin.reservas.show', compact('reserva'));
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $reserva = Reserva::findOrFail($id);
        $clientes = Cliente::orderBy('nome')->get();
        $bicicletas = Bicicleta::orderBy('nome')->get();
        return view('admin.reservas.edit', compact('reserva', 'clientes', 'bicicletas'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $reserva = Reserva::findOrFail($id);
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'bicicleta_id' => 'required|exists:bicicletas,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
            'tipo' => 'required|in:hora,dia',
            'estado' => 'required|in:pendente,ativa,concluida,cancelada',
            'valor_total' => 'required|numeric|min:0',
            'notas' => 'nullable|string'
        ]);

        $estadoAnterior = $reserva->estado;
        $reserva->update($validated);

        if ($validated['estado'] === 'concluida' || $validated['estado'] === 'cancelada') {
            $bicicleta = Bicicleta::find($validated['bicicleta_id']);
            if ($bicicleta) $bicicleta->update(['estado' => 'disponivel']);
        } elseif ($validated['estado'] === 'ativa') {
            $bicicleta = Bicicleta::find($validated['bicicleta_id']);
            if ($bicicleta) $bicicleta->update(['estado' => 'alugada']);
        }

        return redirect()->route('admin.reservas.index')->with('success', 'Reserva atualizada com sucesso!');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        Reserva::findOrFail($id)->delete();
        return redirect()->route('admin.reservas.index')->with('success', 'Reserva removida!');
    }
}