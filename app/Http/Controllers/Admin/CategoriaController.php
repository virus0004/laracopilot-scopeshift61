<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $categorias = Categoria::withCount('bicicletas')->orderBy('nome')->paginate(15);
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $validated = $request->validate([
            'nome' => 'required|string|max:255|unique:categorias',
            'descricao' => 'nullable|string',
            'icone' => 'nullable|string|max:100'
        ]);
        Categoria::create($validated);
        return redirect()->route('admin.categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        $categoria = Categoria::findOrFail($id);
        $validated = $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome,'.$id,
            'descricao' => 'nullable|string',
            'icone' => 'nullable|string|max:100'
        ]);
        $categoria->update($validated);
        return redirect()->route('admin.categorias.index')->with('success', 'Categoria atualizada!');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');
        Categoria::findOrFail($id)->delete();
        return redirect()->route('admin.categorias.index')->with('success', 'Categoria removida!');
    }
}