<?php

namespace App\Livewire\Home;

use App\Models\KanbanMaterialFa as ModelsKanbanMaterialFa;
use Livewire\Component;

class KanbanMaterialFa extends Component
{
    public string $lokasi = "SAI T";
    public $kanban;
    public function render()
    {
        $kanban = ModelsKanbanMaterialFa::all();

        $this->dispatch('materialFaUpdated');
        return view('livewire.home.kanban-material-fa',[
            'kanban' => $kanban
        ]);
    }

    public function change(){
        $this->kanban = ModelsKanbanMaterialFa::query()->where('lokasi', $this->lokasi)->get();
    }
}
