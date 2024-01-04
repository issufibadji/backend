<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'codigo' =>(integer)$this->USUA_ID,
            'nome' =>(string)$this->USUA_NM,
            'email'=>(string)$this->USUA_TX_EMAIL,
            'created_at' =>(string)$this->created_at,
        ];
    }
}
