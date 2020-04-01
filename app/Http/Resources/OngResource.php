<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OngResource extends JsonResource
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
            'whatsapp' => $this->whatsapp,
            'city' => $this->city,
            'uf' => $this->uf,
        ];
    }
}
