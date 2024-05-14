<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\BookingStatus;

class BookingList extends Component
{
    public function render()
    {
        $bookings = BookingStatus::whereIn('booking_status',[0,2])->get();

        return view('livewire.booking-list', ['bookings' => $bookings]);
    }
}
