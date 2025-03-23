<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define order statuses
    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_CANCELLED = 'cancelled';

    protected $fillable = [
        'user_id',
        'total_amount',
        'status', // pending, accepted, cancelled
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    // Helper method to check if the order is pending
    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    // Helper method to check if the order is accepted
    public function isAccepted()
    {
        return $this->status === self::STATUS_ACCEPTED;
    }

    // Helper method to check if the order is cancelled
    public function isCancelled()
    {
        return $this->status === self::STATUS_CANCELLED;
    }
}