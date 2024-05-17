<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\BookingStatus;

class BookingList extends Component
{
    public $data;
    public $bookingid;
    public $details;
    protected $listeners = ['getdetails'];
    public function getdetails($id){
        $this->data = BookingDetail::where('booking_id', $id)
        ->orderBy('details_id', 'desc')
        ->get();

        $this->bookingid = $this->data[0]->container_number;
        $this->details = Booking::where('container_number',$this->bookingid)->first();
    }
    public function render()
    {
        $bookings = BookingStatus::whereIn('booking_status',[0,2])->get();

        return view('livewire.booking-list', ['bookings' => $bookings]);
    }
}
