<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $clientes = Cliente::withCount('reservas')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.clientes.index', compact('clientes'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes',
            'telefone' => 'required|string|max:20',
            'nif' => 'nullable|string|max:20',
            'morada' => 'nullable|string|max:500',
            'cidade' => 'nullable|string|max:100',
            'data_nascimento' => 'nullable|date',
            'notas' => 'nullable|string'
        ]);
        Cliente::create($validated);
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente adicionado com sucesso!');
    }

    public function show($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $cliente = Cliente::with(['reservas.bicicleta', 'pagamentos'])->findOrFail($id);
        return view('admin.clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $cliente = Cliente::findOrFail($id);
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,'.$id,
            'telefone' => 'required|string|max:20',
            'nif' => 'nullable|string|max:20',
            'morada' => 'nullable|string|max:500',
            'cidade' => 'nullable|string|max:100',
            'data_nascimento' => 'nullable|date',
            'notas' => 'nullable|string'
        ]);
        $cliente->update($validated);
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        Cliente::findOrFail($id)->delete();
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente removido!');
    }
}