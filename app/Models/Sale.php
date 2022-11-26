<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'status',
        'delivery_image',
        'customer_id',
        'product_id',
        'location',
        'payment_method',
        'quantity',
        'payment_status',
        'total_amount',
        'total_paid',
        'total_dues',
        'shipping_details',
        'notes',
        'user_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
