@extends('layout_site.index')

@section('conteudo')
<div class="admin-dashboard">
    <h1>Painel Administrativo</h1>
    <p>Bem-vindo ao painel administrativo.</p>
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Sair</button>
    </form>
</div>
@endsection
