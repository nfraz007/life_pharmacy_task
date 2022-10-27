<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $appends = ["type_label", "created_at_label", "updated_at_label"];

    protected $fillable = [
        'order_id',
        'amount',
    ];

    public function getTypeLabelAttribute()
    {
        return $this->type ? "Online" : "Cash";
    }

    public function getCreatedAtLabelAttribute()
    {
        return $this->created_at ? $this->created_at->format(config("constants.datetime_label")) : "";
    }

    public function getUpdatedAtLabelAttribute()
    {
        return $this->updated_at ? $this->updated_at->format(config("constants.datetime_label")) : "";
    }
}
