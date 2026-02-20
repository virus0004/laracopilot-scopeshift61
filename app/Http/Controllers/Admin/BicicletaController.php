<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bicicleta;
use App\Models\Categoria;
use Illuminate\Http\Request;

class BicicletaController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $bicicletas = Bicicleta::with('categoria')->orderBy('created_at', 'desc')->paginate(12);
        return view('admin.bicicletas.index', compact('bicicletas'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $categorias = Categoria::all();
        return view('admin.bicicletas.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'numero_serie' => 'required|string|unique:bicicletas',
            'categoria_id' => 'required|exists:categorias,id',
            'preco_hora' => 'required|numeric|min:0',
            'preco_dia' => 'required|numeric|min:0',
            'estado' => 'required|in:disponivel,alugada,manutencao,inativa',
            'cor' => 'nullable|string|max:100',
            'tamanho' => 'nullable|string|max:50',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('bicicletas', 'public');
        }

        Bicicleta::create($validated);
        return redirect()->route('admin.bicicletas.index')->with('success', 'Bicicleta adicionada com sucesso!');
    }

    public function show($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $bicicleta = Bicicleta::with(['categoria', 'reservas.cliente'])->findOrFail($id);
        return view('admin.bicicletas.show', compact('bicicleta'));
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $bicicleta = Bicicleta::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.bicicletas.edit', compact('bicicleta', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $bicicleta = Bicicleta::findOrFail($id);
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'numero_serie' => 'required|string|unique:bicicletas,numero_serie,'.$id,
            'categoria_id' => 'required|exists:categorias,id',
            'preco_hora' => 'required|numeric|min:0',
            'preco_dia' => 'required|numeric|min:0',
            'estado' => 'required|in:disponivel,alugada,manutencao,inativa',
            'cor' => 'nullable|string|max:100',
            'tamanho' => 'nullable|string|max:50',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('bicicletas', 'public');
        }

        $bicicleta->update($validated);
        return redirect()->route('admin.bicicletas.index')->with('success', 'Bicicleta atualizada com sucesso!');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        Bicicleta::findOrFail($id)->delete();
        return redirect()->route('admin.bicicletas.index')->with('success', 'Bicicleta removida com sucesso!');
    }
}