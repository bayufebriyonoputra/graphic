<?php

namespace App\Livewire\Home;

use App\Models\KanbanCircuit as ModelsKanbanCircuit;
use Livewire\Component;

class KanbanCircuit extends Component
{
    public $lokasi = 'SAI T';
    public $bulan;
    public $noControl;
    public $issue;
    public $wip;
    public $kanban;
    public function render()
    {

        $this->kanban  = ModelsKanbanCircuit::query()->where('lokasi', $this->lokasi)->get();
        $this->bulan = json_encode($this->kanban->pluck('month'));
        $this->noControl = json_encode($this->kanban->pluck('no_control'));
        $this->issue = json_encode($this->kanban->pluck('issue'));
        $this->wip = json_encode($this->kanban->pluck('wip'));
        $this->kanban = json_encode($this->kanban->pluck('kanban'));
        $this->dispatch('circuitUpdated');
        return view('livewire.home.kanban-circuit');
    }

    public function change(){
        $this->kanban  = ModelsKanbanCircuit::query()->where('lokasi', $this->lokasi)->get();
        $this->dispatch('updateCircuit', noControl: $this->kanban->pluck('no_control'),
         month: $this->kanban->pluck('month'),
        issue: $this->kanban->pluck('issue'),
        wip: $this->kanban->pluck('wip'));
    }


}
