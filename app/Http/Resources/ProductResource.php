<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data =  parent::toArray($request);
        $data['price'] =  (float) round(($data['price'] / 100), 2);
        $data['image'] = url('images/'. $data['image']);
        $data['category'] = $this->category;
        return $data;
    }
}
