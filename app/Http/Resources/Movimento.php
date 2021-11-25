<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movimento extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'produto_id' => $this->produto_id,
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
