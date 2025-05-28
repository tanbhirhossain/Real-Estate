<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'check_in',
        'check_out',
        'no_nights',
        'discount',
        'total_cost',
        'note',
        'status',
        'created_by', // If you allow mass assignment for this
        // 'cancelled_by', // Usually not set on creation
        // 'remarks', // Usually not set on creation
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'discount' => 'decimal:2',
        'total_cost' => 'decimal:2',
    ];

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function creator() // For created_by
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function canceller() // For cancelled_by
    {
        return $this->belongsTo(User::class, 'cancelled_by');
    }
}