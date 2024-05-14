<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    use HasFactory;

    protected $table = 'booking_status_tbl';

    // Define the primary key if it is different from the default 'id'
    protected $primaryKey = 'status_id';

    // Specify if the primary key is auto-incrementing
    public $incrementing = true;

    // Specify the data type of the primary key
    protected $keyType = 'int';

    // If the model does not have timestamp fields (created_at, updated_at), set this to false
    public $timestamps = true;

    // Define the fields that are mass assignable
    protected $fillable = [
        'booking_id',
        'pod',
        'booking_status',
        'date_created',
        'eta',
        'ata',
        'is_active'
    ];

    // Define the relationship with the Booking model
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'booking_id');
    }

    public function bookingLatest()
    {
        return $this->hasOne(BookingDetail::class, 'booking_id', 'booking_id')->latest('order_step');
    }
}
