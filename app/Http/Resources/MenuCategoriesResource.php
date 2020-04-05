<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuCategoriesResource extends JsonResource
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
            // 'parent_id' => $this->parent_id,
            'description' => $this->description,
            'priority' => $this->priority,
            'image' => $this->image,
            'status' => $this->status,
            'permalink_slug' => $this->permalink_slug,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'parent_name' => $this->parent,
        ];
    }
}
