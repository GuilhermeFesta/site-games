@extends('admin_layout.index')

@section('admin_template')
<div class="container" style="margin-top: 100px;">
    <h1 class="text-center">{{ isset($produto) ? 'Editar Produto' : 'Adicionar Produto' }}</h1>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ isset($produto) ? route('produtos.update', $produto->id) : route('produtos.store') }}" method="POST" class="mx-auto" style="max-width: 600px;">
        @csrf
        @if (isset($produto))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="prod_nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="prod_nome" name="prod_nome" value="{{ $produto->prod_nome ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="prod_quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="prod_quantidade" name="prod_quantidade" value="{{ $produto->prod_quantidade ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="prod_descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="prod_descricao" name="prod_descricao" required>{{ $produto->prod_descricao ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cat_id" class="form-label">Categoria</label>
            <select class="form-select" id="cat_id" name="cat_id" required>
                <option value="">Selecione uma Categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ isset($produto) && $produto->cat_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*" {{ isset($produto) ? '' : 'required' }}>
            @if (isset($produto) && $produto->imagem)
                <img src="{{ asset($produto->imagem) }}" class="img-fluid rounded mt-3" alt="{{ $produto->nome }}">
            @endif
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">{{ isset($produto) ? 'Atualizar' : 'Adicionar' }}</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>

    <h2 class="mt-5 text-center">Lista de Produtos</h2>
    <div class="list-group">
        @foreach ($produtos as $produto)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <span>{{ $produto->prod_nome }} ({{ $produto->categoria->nome ?? 'Sem Categoria' }})</span>
                <div>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                    </form>
                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
