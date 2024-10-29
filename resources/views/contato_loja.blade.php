@extends("layout_site.index")
@section("conteudo")

<div class="main-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="caption header-text">
                    <h6>Bem-vindo à Fast Games</h6>
                    <h2>Suporte ao Cliente</h2>
                    <p>Se você precisar de ajuda, entre em contato conosco através das informações abaixo.</p>
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

<div class="support-info py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h6>Contato para Suporte</h6>
                    <h2>Estamos Aqui para Ajudar!</h2>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2">
                <div class="shadow p-4 bg-light text-center">
                    <h4>Email de Suporte:</h4>
                    <p><a href="mailto:support@fastgames.com">support@fastgames.com</a></p>
                    <h4>Telefone:</h4>
                    <p>(11) 1234-5678</p>
                    <h4>Horário de Atendimento:</h4>
                    <p>Segunda a Sexta, das 9h às 18h</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
