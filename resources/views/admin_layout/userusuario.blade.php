@extends('admin_layout.index')

@section('admin_template')
<div class="container">
    <h1>Gerenciamento de Usuários</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editAdminModal{{ $user->id }}">Editar</button>
                        <form action="{{ route('useradmin.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este admin?')">Excluir</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal de Edição -->
                <div class="modal fade" id="editAdminModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editAdminModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('useradmin.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editAdminModalLabel{{ $user->id }}">Editar Administrador</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Nome:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Senha (deixe em branco se não quiser alterar):</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirmar Senha:</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de Criação -->
<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="createAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('useradmin.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createAdminModalLabel">Criar Novo Administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Senha:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Inicializa os modais
    $(document).ready(function () {
        $('#createAdminModal').modal();
    });
</script>
@endsection
