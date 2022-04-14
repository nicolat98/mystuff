<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CartLine as CartLineResource;
use App\Models\DataLayer;

class Shipment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $dl = new DataLayer();
        
        $cartLines = $dl->getCartLinesByCartID($this->cart->id);
        
        return [
            'name' => $this->user_name." ".$this->user_surname,
            'address' => $this->address,
            'city' => $this->city,
            'province' => $this->province,
            'country' => $this->country,
            'CAP' => $this->CAP,
            'telephone_number' => $this->telephone_number,
            'products' => CartLineResource::collection($cartLines),
        ];
    }
}
