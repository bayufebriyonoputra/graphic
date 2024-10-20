<?php

namespace App\Livewire\Home;

use App\Models\KanbanMaterialFa as ModelsKanbanMaterialFa;
use Livewire\Component;

class KanbanMaterialFa extends Component
{
    public string $lokasi = "SAI T";
    public $kanban;
    public $month;
    public $partNumber;
    public $partAddress;
    public $issue;
    public $wip;
    public function render()
    {
        $this->kanban = ModelsKanbanMaterialFa::query()->where('lokasi', $this->lokasi)->get();
        $this->month = $this->kanban->pluck('month');
        $this->partNumber = $this->kanban->pluck('part_number');
        $this->partAddress = $this->kanban->pluck('part_address');
        $this->issue = $this->kanban->pluck('issue');
        $this->wip = $this->kanban->pluck('wip');

        $this->dispatch('materialFaUpdated');
        return view('livewire.home.kanban-material-fa');
    }

    public function change()
    {
        $kanban = ModelsKanbanMaterialFa::query()->where('lokasi', $this->lokasi)->get();
        $this->dispatch(
            'materialFaUpdate',
            month: $kanban->pluck('month'),
            partNumber: $kanban->pluck('part_number'),
            partAddress: $kanban->pluck('part_address'),
            issue: $kanban->pluck('issue'),
            wip: $kanban->pluck('wip')
        );
    }
}
