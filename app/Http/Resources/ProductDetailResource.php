<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "price" => $this->price,
            "in_stock_label" => $this->in_stock_label,
            "created_at" => $this->created_at->format(config("constants.datetime_label")),
            "updated_at" => $this->updated_at->format(config("constants.datetime_label")),
        ];
    }
}
