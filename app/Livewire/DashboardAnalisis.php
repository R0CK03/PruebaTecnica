<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Indicator;

class DashboardAnalisis extends Component
{
    public $indicadorSeleccionado = 'Huella de Carbono';

    public function render()
    {
        $datos = Indicator::where('name', $this->indicadorSeleccionado)
                          ->orderBy('measured_at', 'asc')
                          ->get();

        return view('livewire.dashboard-analisis', [
            'datos' => $datos
        ]);
    }
}