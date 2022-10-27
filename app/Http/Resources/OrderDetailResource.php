<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            "user_id" => $this->user_id,
            "product_id" => $this->product_id,
            "user_name" => $this->user_name,
            "user_email" => $this->user_email,
            "product_name" => $this->product_name,
            "product_price" => $this->product_price,
            "qty" => $this->qty,
            "total" => $this->total,
            "status" => $this->status,
            "status_label" => $this->status_label,
            "transaction_status_label" => $this->transaction_status_label,
            "created_at_label" => $this->created_at_label,
            "updated_at_label" => $this->updated_at_label,
        ];
    }
}
