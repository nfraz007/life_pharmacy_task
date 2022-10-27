<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderTableResource extends JsonResource
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
            "user" => $this->user_name,
            "product" => $this->product_name,
            "total" => $this->total,
            "status_label" => $this->status_label,
            "transaction_status_label" => $this->transaction_status_label,
            "created_at_label" => $this->created_at_label,
            "action_show" => route("order.show", $this->id)
        ];
    }
}
