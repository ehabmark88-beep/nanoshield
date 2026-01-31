<?php

namespace App\Livewire;

use Livewire\Component;

class BookingCalendar extends Component
{
    public $governorate_id;
    public $branch_id;
    public $branches = [];
    public $bookedTimes = [];

    public function updatedGovernorateId($governorate_id)
    {
        $this->branches = Branch::where('governorate_id', $governorate_id)->get();
        $this->branch_id = null;
        $this->bookedTimes = [];
    }

    public function updatedBranchId($branch_id)
    {
        if ($branch_id) {
            $this->updateBookedTimes($branch_id);
        }
    }

    public function updateBookedTimes($branch_id)
    {
        $this->bookedTimes = [];
        $today = Carbon::today();
        for ($i = 0; $i < 7; $i++) {
            $date = $today->copy()->addDays($i)->format('Y-m-d');
            $bookedTimesForDate = WashBooking::where('branch_id', $branch_id)
                ->whereDate('date', $date)
                ->pluck('time')
                ->toArray();

            $this->bookedTimes[$date] = $bookedTimesForDate;
        }
    }

    public function render()
    {
        return view('livewire.booking-calendar', [
            'governorates' => \App\Models\Governorate::all(),
        ]);
    }

//    public function render()
//    {
//        return view('livewire.booking-calendar');
//    }
}
