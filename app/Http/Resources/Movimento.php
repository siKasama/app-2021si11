<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movimento extends JsonResource
{
    public function toArray($request)
    {
        return [
            'produto' => $this->produto_id,
            'SKU' => $this->SKU,
            'quantidade' => $this->quantidade,
            'data' => $this->data
        ];
    }

    public static function toMessage($response)
    {
        return [
            'Sucesso' => $response['sucesso'],
            'Mensagem' => $response['mensagem']
        ];
    }
}
