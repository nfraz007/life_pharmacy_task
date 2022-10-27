<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $appends = ["in_stock_label", "created_at_label", "updated_at_label"];

    protected $fillable = [
        'name',
        'price',
        'in_stock',
    ];

    public function getInStockLabelAttribute()
    {
        return $this->in_stock ? "Yes" : "No";
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
