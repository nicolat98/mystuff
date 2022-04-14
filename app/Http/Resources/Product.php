<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'code' => $this->name,
            'price' => $this->price,
            'category' => $this->category->name,
            'capacity' => $this->capacity,
            'model' => $this->model,
            'assurance' => $this->assurance,
            'color' => $this->color,
        ];
    }
}
