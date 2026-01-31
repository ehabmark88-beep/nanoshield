<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class Cartcounter extends Component
{
    public $count = 0;

    protected $listeners = ['updateCartCount' => 'getCount'];

    public function render()
    {
        // تحديث عداد السلة
        $this->getCount();

        return view('livewire.cartcounter');
    }

    // جلب عدد العناصر في السلة
    public function getCount()
    {
        $this->count = Cart::whereUserId(auth()->user()->id)->count();
    }
}
