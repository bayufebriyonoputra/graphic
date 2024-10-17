<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\KanbanMaterialFaForm;
use App\Livewire\KanbanMaterialFaTable;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.dashboard.main')]
class KanbanMaterialFa extends Component
{
    public KanbanMaterialFaForm $form;
    public function render()
    {
        return view('livewire.admin.kanban-material-fa');
    }

    public function save(){
        $this->form->store();
        $this->dispatch('pg:eventRefresh-default')->to(KanbanMaterialFaTable::class);
    }
}
