<?php

namespace App\Http\Livewire;

use App\Models\BookingStatus;
use Livewire\Component;
use Carbon\Carbon;



class BookingListTwo extends Component
{

    public $pod, $sto, $po, $booking, $container;
    public function clearFilters()
    {
        $this->pod = null;
        $this->sto = null;
        $this->po = null;
        $this->booking = null;
        $this->container = null;

        $this->emit('closeviewall');
    }
    public function render()
    {
        $currentDate = Carbon::now();
        $twoWeeksFromNow = $currentDate->addWeeks(2)->toDateString(); // Convert to 'YYYY-MM-DD' format
        $query = BookingStatus::whereRaw("CONVERT(date, eta, 103) <= ?", [$twoWeeksFromNow])
            ->whereIn('booking_status', [0, 2]);

        // Apply filters if they are set
        if ($this->pod) {
            $query->where('pod', $this->pod);
        }
        if ($this->sto) {
            $query->whereHas('booking', function ($q) {
                $q->where('sto_number', 'like', '%' . $this->sto . '%');
            });        }
        if ($this->po) {
            $query->whereHas('booking', function ($q) {
                $q->where('customer_po', 'like', '%' . $this->po . '%');
            });
        }
        if ($this->booking) {
            $query->whereHas('booking', function ($q) {
                $q->where('booking_number', 'like', '%' . $this->booking . '%');
            });
        }
        if ($this->container) {
            $query->whereHas('booking', function ($q) {
                $q->where('container_number', 'like', '%' . $this->container . '%');
            });
        }

        // Execute the query
        $bookings = $query->get();


        return view('livewire.booking-list-two', ['bookings' => $bookings]);
    }
}
