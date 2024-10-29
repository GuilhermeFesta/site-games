<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Fast Games</title>

    <!-- Bootstrap core CSS -->
    <link href="/layout_site/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para ícone de carrinho -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/layout_site/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/layout_site/assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="/layout_site/assets/css/owl.css">
    <link rel="stylesheet" href="/layout_site/assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Logo Start ***** -->
              <a href="index.html" class="logo"></a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li><a href="/">Home</a></li>
                <li><a href="/nossa_loja">Nossa Loja</a></li>
                <li><a href="/contato_loja">Contatos</a></li>
                <li><a href="/login">Login</a></li>
                <li>
                  <!-- Ícone de Carrinho -->
                  <a href="/carrinho" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                  </a>
                </li>
              </ul>   
              <a class='menu-trigger'>
                <span>Menu</span>
              </a>
              <!-- ***** Menu End ***** -->
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- ***** Header Area End ***** -->
    @yield("conteudo")

    <footer>
      <div class="container">
        <div class="col-lg-12 text-center">
          <p>Copyright © Fast Games Company. All rights reserved.</p>
          <p>Área Administrativa: <a href="/login_adm" class="btn btn-secondary">Acessar</a></p>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="/layout_site/vendor/jquery/jquery.min.js"></script>
    <script src="/layout_site/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/layout_site/assets/js/isotope.min.js"></script>
    <script src="/layout_site/assets/js/owl-carousel.js"></script>
    <script src="/layout_site/assets/js/counter.js"></script>
    <script src="/layout_site/assets/js/custom.js"></script>

    <!-- JavaScript para atualizar a contagem do carrinho -->
    <script>
      // Exemplo básico para manipular contagem do carrinho
      const cartCount = document.querySelector('.cart-count');
      
      function atualizarCarrinho(qtd) {
        cartCount.textContent = qtd;
      }

      // Exemplo de chamada para atualizar o número de itens
      atualizarCarrinho(5);  // Substitua 5 pelo valor dinâmico de itens no carrinho
    </script>

  </body>
</html>
