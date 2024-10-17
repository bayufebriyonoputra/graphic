<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\KanbanMaterialPaForm;
use App\Livewire\KanbanMaterialPaTable;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.dashboard.main')]
class KanbanMaterialPa extends Component
{
    public KanbanMaterialPaForm $form;
    public function render()
    {
        return view('livewire.admin.kanban-material-pa');
    }

    public function save(){
        $this->form->store();
        $this->dispatch('pg:eventRefresh-default')->to(KanbanMaterialPaTable::class);
    }
}
