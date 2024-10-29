@extends('layout_site.index')

@section('conteudo')
<section class="container my-5">
    <h2 class="text-center mb-4">Seu Carrinho</h2>

    <!-- Cart Items -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Item 1 -->
            <div class="cart-item d-flex align-items-center">
                <img src="/layout_site/assets/images/product-1.jpg" alt="Produto 1" class="img-fluid" style="width: 100px; height: auto;">
                <div class="ms-3">
                    <h5 class="mb-1">Nome do Produto 1</h5>
                    <p class="mb-1 text-muted">Categoria: Jogos</p>
                    <div class="quantity-control">
                        <button class="btn btn-outline-secondary">-</button>
                        <input type="text" value="1" class="form-control text-center" style="width: 50px;">
                        <button class="btn btn-outline-secondary">+</button>
                    </div>
                    <p class="mt-2">Preço: R$ 59,90</p>
                </div>
                <div class="ms-auto">
                    <p class="fw-bold">R$ 59,90</p>
                    <a href="#" class="text-danger">Remover</a>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="cart-item d-flex align-items-center">
                <img src="/layout_site/assets/images/product-2.jpg" alt="Produto 2" class="img-fluid" style="width: 100px; height: auto;">
                <div class="ms-3">
                    <h5 class="mb-1">Nome do Produto 2</h5>
                    <p class="mb-1 text-muted">Categoria: Jogos</p>
                    <div class="quantity-control">
                        <button class="btn btn-outline-secondary">-</button>
                        <input type="text" value="2" class="form-control text-center" style="width: 50px;">
                        <button class="btn btn-outline-secondary">+</button>
                    </div>
                    <p class="mt-2">Preço: R$ 29,90</p>
                </div>
                <div class="ms-auto">
                    <p class="fw-bold">R$ 59,80</p>
                    <a href="#" class="text-danger">Remover</a>
                </div>
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="col-lg-4">
            <div class="bg-light p-4 rounded">
                <h4 class="text-center">Resumo do Pedido</h4>
                <div class="d-flex justify-content-between">
                    <p>Subtotal</p>
                    <p>R$ 119,70</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Desconto</p>
                    <p>- R$ 10,00</p>
                </div>
                <div class="d-flex justify-content-between cart-total">
                    <p>Total</p>
                    <p>R$ 109,70</p>
                </div>
                <button id="checkout-button" class="btn btn-primary checkout-btn mt-3">Finalizar Compra</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#checkout-button').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('init.payment') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    // Inclua os detalhes do seu carrinho aqui
                },
                success: function(response) {
                    window.location.href = response.init_point; // Redirecionar para o Mercado Pago
                },
                error: function() {
                    alert('Erro ao iniciar o pagamento. Tente novamente.');
                }
            });
        });
    });
              </script>

            </div>
        </div>
    </div>
</section>
@endsection
