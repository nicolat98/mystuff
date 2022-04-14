<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\DataLayer;
use App\Http\Resources\Shipment as ShipmentResource;

class UserOrders extends JsonResource
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
        $shipments = $dl->getShipmentByUserID($this->id);
        
        return [
            'username' => $this->name,
            'email' => $this->email,
            'orders' => ShipmentResource::collection($shipments),
        ];
    }
}
