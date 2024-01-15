<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => 999 + $this->id,
            'language' => $this->language,
            'img' => $this->img_url,
            'website' => $this->website,
            'layout' => $this->layout,
            'name' => $this->name,
        ];
    }
}
