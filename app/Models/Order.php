<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'status',
        'amount',
    ];

    public function Customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
