<?php

namespace App\Livewire\Home;

use Livewire\Component;

class KanbanMaterialPa extends Component
{
    public $lokasi = 'SAI T';
    public function render()
    {
        $this->dispatch('materialPaUpdated');
        return view('livewire.home.kanban-material-pa');
    }
}
