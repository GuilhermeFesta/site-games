<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::where("prod_ativo", "1")->with('categoria')->get();
        $categorias = Categoria::where("cat_ativo", "1")->get();
        return view('produtos.index', compact('produtos', 'categorias'));
    }

    public function salvarNovoProduto(Request $request)
    {
        $request->validate([
            'cat_id' => 'required|exists:categorias,id',
            'prod_nome' => 'required|string|max:255',
            'prod_quantidade' => 'required|integer',
            'prod_descricao' => 'nullable|string',
            'imagem' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagemNome = uniqid() . '.' . $request->imagem->extension();
        $request->imagem->move(public_path('layout_site/produtos'), $imagemNome);

        // Cria o produto e salva o caminho da imagem
        Produto::create([
            'cat_id' => $request->cat_id,
            'prod_nome' => $request->prod_nome,
            'prod_quantidade' => $request->prod_quantidade,
            'prod_descricao' => $request->prod_descricao,
            'imagem' => 'layout_site/produtos/' . $imagemNome,
        ]);

        return redirect()->route('produtos_index')->with('success', 'Produto criado com sucesso!');
    }

    public function detalhesProduto(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function formularioAlterar(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function salvarAlterarProduto(Request $request, Produto $produto)
    {
        $request->validate([
            'cat_id' => 'required|exists:categorias,id',
            'prod_nome' => 'required|string|max:255',
            'prod_quantidade' => 'required|integer',
            'prod_descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Verifica se há uma nova imagem e move-a para a pasta correta
        if ($request->hasFile('imagem')) {
            $imagemNome = uniqid() . '.' . $request->imagem->extension();
            $request->imagem->move(public_path('layout_site/produtos'), $imagemNome);
            $produto->imagem = 'layout_site/produtos/' . $imagemNome;
        }

        $produto->update($request->except('imagem'));

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
