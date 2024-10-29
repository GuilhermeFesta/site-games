@extends("layout_site.index")
@section("conteudo")

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Bem Vindos a Fast Games</h6>
            <h2>O MELHOR SITE DE JOGOS!</h2>
            <p>Esse site é uma plataforma online com uma ampla variedade de jogos, desde classicos até os mais modernos. Ele conta com categorias diversas, como ação, aventura, jogos de estrategias entre outros.</p>
            <div class="search-input">
              <form id="search" action="#">
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
            <img src="/layout_site/assets/images/banner-image.jpg" alt="">
            <span class="price">$22</span>
            <span class="offer">-40%</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <a>
            <div class="item">
              <div class="image">
                <img src="/layout_site/assets/images/featured-01.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Armazenamento Grátis</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a>
            <div class="item">
              <div class="image">
                <img src="/layout_site/assets/images/featured-02.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Mais Usuários</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a>
            <div class="item">
              <div class="image">
                <img src="/layout_site/assets/images/featured-03.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Resposta Rapida</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a>
            <div class="item">
              <div class="image">
                <img src="/layout_site/assets/images/featured-04.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Prático</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>




  <div class="section categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Categorias</h6>
            <h2>Top Categorias</h2>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Moba</h4>
            <div class="thumb">
              <img src="/layout_site/assets/images/categories-01.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>FPS</h4>
            <div class="thumb">
              <img src="/layout_site/assets/images/categories-05.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>PVP</h4>
            <div class="thumb">
             <img src="/layout_site/assets/images/categories-03.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Battle Royale</h4>
            <div class="thumb">
              <img src="/layout_site/assets/images/categories-04.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Ação</h4>
            <div class="thumb">
              <img src="/layout_site/assets/images/categories-05.jpg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="shop">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Nossa Loja</h6>
                  <h2>Vá para a pré-encomenda e compre, obtenha os melhores <em>Preços</em> Para você!</h2>
                </div>
                <div class="main-button">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-2 align-self-end">
          <div class="subscribe">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>INFORMAÇÃO</h6>
                  <h2>Ganhe até $ 100 de desconto, basta comprar e <em>Inscrever-se</</h2>
                </div>
                <div class="search-input">
                  <form id="subscribe" action="#">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection