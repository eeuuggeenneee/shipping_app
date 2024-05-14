<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

     // Define the table name if it differs from the model name in plural form
     protected $table = 'booking_details_tbl';

     // Define the primary key if it is different from the default 'id'
     protected $primaryKey = 'details_id';

     // Specify if the primary key is auto-incrementing
     public $incrementing = true;

     // Specify the data type of the primary key
     protected $keyType = 'int';

     // If the model does not have timestamp fields (created_at, updated_at), set this to false
     public $timestamps = true;

     // Define the fields that are mass assignable
     protected $fillable = [
         'booking_id',
         'booking_number',
         'container_number',
         'order_step',
         'status_date',
         'status_loc',
         'status_desc',
         'eta_ata',
         'date_created'
     ];

     // Define the relationship with the Booking model
     public function booking()
     {
         return $this->belongsTo(Booking::class, 'booking_id', 'booking_id');
     }


}
