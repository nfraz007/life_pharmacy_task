<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $appends = ["status_label", "transaction_status_label", "created_at_label", "updated_at_label"];

    protected $fillable = [
        'user_id',
        'product_id',
        'user_name',
        'user_email',
        'product_name',
        'product_price',
        'qty',
        'total',
        'status',
        'transaction_status',
    ];

    public function getStatusLabelAttribute()
    {
        return $this->status == 0 ? "Pending" : ($this->status == 1 ? "Inprocess" : ($this->status == 2 ? "Completed" : "Invalid"));
    }

    public function getTransactionStatusLabelAttribute()
    {
        return $this->transaction_status == 0 ? "Unpaid" : ($this->transaction_status == 1 ? "Partial" : ($this->transaction_status == 2 ? "Paid" : "Invalid"));
    }

    public function getCreatedAtLabelAttribute()
    {
        return $this->created_at ? $this->created_at->format(config("constants.datetime_label")) : "";
    }

    public function getUpdatedAtLabelAttribute()
    {
        return $this->updated_at ? $this->updated_at->format(config("constants.datetime_label")) : "";
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
