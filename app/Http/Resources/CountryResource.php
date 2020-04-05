<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'country_name' => $this->country_name,
            'iso_code_2' => $this->iso_code_2,
            'iso_code_3' => $this->iso_code_3,
            'status' => $this->status,
            'format' => $this->format,
            'flag' => $this->flag,
            'priority' => $this->priority,
        ];
    }
}
