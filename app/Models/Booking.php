<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking_tbl';
    protected $primaryKey = 'booking_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'booking_number',
        'sto_number',
        'customer_po',
        'date_booked',
        'batts_qty',
        'forwarder',
        'carrier',
        'container_number',
        'booking_status',
        'latest_step',
        'date_created',
        'is_active'
    ];

    protected $dates = [
        'date_booked',
        'date_created'
    ];

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class, 'booking_id', 'booking_id');
    }

    public function bookingStatuses()
    {
        return $this->hasMany(BookingStatus::class, 'booking_id', 'booking_id');
    }

    // In your Booking model
    public function latestStatus()
    {
        return $this->hasOne(BookingStatus::class, 'booking_id', 'booking_id')
            ->latestOfMany();
    }
}
