<?php

namespace App\Services;

class WhatsappMessageService
{
    public function generate($orderCreated, array $cart, int $total)
    {

        $message = "*Pedido* #{$orderCreated->id}\n\n";
        $message .= "*Cliente:* {$orderCreated->name}\n";
        $message .= "*Telefone:* {$orderCreated->phone}\n";

        if ($orderCreated->delivery_type === "delivery") {
            $message .= "*Entrega:* {$orderCreated->delivery_type}\n";
        } else {
            $message .= "*Entrega:* Retirada\n";
        }


        if (!empty($orderCreated->address)) {
            $message .= "*Endereço:* {$orderCreated->address}\n";
        }

        if (!empty($orderCreated->reference)) {
            $message .= "*Referência:* {$orderCreated->reference}\n";
        }

        $message .= "\n*Produtos:*\n\n";

        foreach ($cart as $item) {

            $message .= "*{$item['name']}*\n";
            $message .= "*Tamanho:* {$item['size']}\n";
            $message .= "*Cor:* {$item['color']}\n";
            $message .= "*Qtd:* {$item['quantity']}\n";
            $message .= "*Subtotal:* R$ " . number_format(
                $item['price'] * $item['quantity'],
                2,
                ',',
                '.'
            ) . "\n\n";
        }

        $message .= "*Pagamento:* {$orderCreated->payment_method}\n";
        $message .= "*Total:* R$ " . number_format($total, 2, ',', '.') . "\n";

        if (!empty($orderCreated->note)) {
            $message .= "*Observação:* {$orderCreated->note}\n";
        }

        $phone = '5511961156268'; // número da loja

        return "https://wa.me/{$phone}?text=" . urlencode($message);
    }
}