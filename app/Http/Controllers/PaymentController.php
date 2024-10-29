<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Preference;

class PaymentController extends Controller
{
    public function initPayment(Request $request)
    {
        try {
            // Configurar as credenciais do Mercado Pago
            if (env('APP_ENV') === 'local' || env('APP_ENV') === 'testing') {
                // Usar as credenciais de sandbox para testes
                SDK::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN_SANDBOX'));
            } else {
                // Usar as credenciais de produção
                SDK::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));
            }
    
            // Criar uma preferência
            $preference = new Preference();
    
            // Adicionar itens ao pagamento
            $item = new \MercadoPago\Item();
            $item->title = "Nome do Produto"; // Nome do produto
            $item->quantity = 1; // Quantidade
            $item->unit_price = 59.90; // Preço unitário
            $preference->items = array($item);
    
            // Configurar URL de retorno
            $preference->back_urls = array(
                "success" => route('payment.success'),
                "failure" => route('payment.failure'),
                "pending" => route('payment.pending')
            );
    
            // Salvar a preferência
            $preference->save();
    
            // Redirecionar para a URL de pagamento
            return response()->json(['init_point' => $preference->init_point]);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}    
