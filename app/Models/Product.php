<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $appends = ["in_stock_label"];

    protected $fillable = [
        'name',
        'price',
        'in_stock',
    ];

    public function getInStockLabelAttribute()
    {
        return $this->in_stock ? "Yes" : "No";
    }
}
