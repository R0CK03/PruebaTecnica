<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Indicator;

class DashboardAnalisis extends Component
{
    public $indicators;

    public function mount()
    {
        $this->indicators = Indicator::all();
    }

    public function render()
    {
        return view('livewire.dashboard-analisis');
    }
}