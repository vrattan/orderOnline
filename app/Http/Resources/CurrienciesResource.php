<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrienciesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'country_id' => $this->country,
            'currency_name' => $this->currency_name,
            'currency_code' => $this->currency_code,
            'currency_symbol' => $this->currency_symbol,
            'currency_rate' => $this->currency_rate,
            'symbol_position' => $this->symbol_position,
            'thousand_sign' => $this->thousand_sign,
            'decimal_sign' => $this->decimal_sign,
            'decimal_position' => $this->decimal_position,
            'status' => $this->status,
        ];
    }
}
