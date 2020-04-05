<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
        'name' => $this->name,
        'email' => $this->email,
        'address_1' => $this->address_1,
        'address_2' => $this->address_2,
        'city' => $this->city,
        'state' => $this->state,
        'postal_code' => $this->postal_code,
        'country_id' => $this->country,
        'description' => $this->description,
        'telephone' => $this->telephone,
        'status' => $this->status,
        'image' => $this->image,
        'permalink_slug' => $this->permalink_slug,
    ];
    }
}
