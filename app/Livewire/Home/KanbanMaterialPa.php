<?php

namespace App\Livewire\Home;

use App\Models\KanbanMaterialPa as ModelsKanbanMaterialPa;
use Livewire\Component;

class KanbanMaterialPa extends Component
{
    public $lokasi = 'SAI T';
    public $month;
    public $partNumber;
    public $partAddress;
    public $issue;
    public $wip;
    public function render()
    {
        $kanban = ModelsKanbanMaterialPa::query()->where('lokasi', $this->lokasi)->get();
        $this->month = $kanban->pluck('month');
        $this->partNumber = $kanban->pluck('part_number');
        $this->partAddress = $kanban->pluck('part_address');
        $this->issue = $kanban->pluck('issue');
        $this->wip = $kanban->pluck('wip');
        $this->dispatch('materialPaUpdated');
        return view('livewire.home.kanban-material-pa');
    }

    public function change()
    {
        $kanban = ModelsKanbanMaterialPa::query()->where('lokasi', $this->lokasi)->get();
        $this->dispatch(
            'updateMaterialPa',
            month: $kanban->pluck('month'),
            partNumber: $kanban->pluck('part_number'),
            partAddress: $kanban->pluck('part_address'),
            issue: $kanban->pluck('issue'),
            wip: $kanban->pluck('wip')
        );
    }
}
