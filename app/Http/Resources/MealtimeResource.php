<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealtimeResource extends JsonResource
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
            'name' => $this->mealtime_name,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status' => $this->status,
        ];
    }
}
