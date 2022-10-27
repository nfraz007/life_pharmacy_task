<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionTableResource extends JsonResource
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
            "type_label" => $this->type_label,
            "amount" => $this->amount,
            "created_at_label" => $this->created_at_label,
            "updated_at_label" => $this->updated_at_label,
            "action_show" => route("transaction.show", [$this->order_id, $this->id])
        ];
    }
}
