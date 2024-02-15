<?php

namespace App\Http\Resources\Crypto;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CryptoResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
          'name' => $this->name,
            'description'=> $this->description,
          'price' => $this->price ,
          'symbol' => $this->symbol,
        ];
    }
}
