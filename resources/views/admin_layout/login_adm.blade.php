@extends("layout_site.index")

@section("conteudo")
<div class="main-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="caption header-text">
                    <h6>Bem-vindo à Fast Games</h6>
                    <h2>Login Administrativo</h2>
                    <p>Acesse os melhores sites de jogos para desenvolvedores.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-image">
                    <img src="/layout_site/assets/images/contact-banner.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="login-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="login-form text-center">
                    <h2>Login Adm</h2>
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Usuário</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .login-section {
        padding: 50px 0;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .login-form h2 {
        margin-bottom: 20px;
        font-weight: bold;
    }
    .form-group label {
        font-weight: bold;
    }
    .form-control {
        margin-bottom: 15px;
    }
    .btn-primary {
        width: 100%;
    }
</style>
@endsection
