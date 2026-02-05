<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_mobile',
        'customer_cnic',
        'billing_address',
        'billing_city',
        'billing_country',
        'billing_postal_code',
        'subtotal',
        'total',
        'status',
        'payfast_transaction_id',
        'payfast_status_code',
        'payfast_status_message',
        'payfast_meta',
    ];

    protected $casts = [
        'payfast_meta' => 'array',
        'subtotal' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
