@extends("layout_site.index")
@section("conteudo")

<div class="main-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="caption header-text">
                    <h6>Bem-vindo à Fast Games</h6>
                    <h2>Cadastro</h2>
                    <p>Entre na aventura! Faça seu cadastro na Fast Games.</p>
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
                    <h2>Cadastro</h2>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirme a Senha</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                    <p class="mt-3">Já tem uma conta? <a href="{{ route('login') }}">Faça login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
  .login-section {
    padding: 50px 0;
    background-color: #f8f9fa; /* Fundo claro para contraste */
    border-radius: 10px; /* Cantos arredondados */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); /* Sombra para profundidade */
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
    width: 100%; /* Botão ocupa toda a largura */
  }
</style>

@endsection
