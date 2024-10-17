<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\KanbanCircuitForm;
use App\Livewire\KanbanCircuitTable;
use App\Models\KanbanCircuit as ModelsKanbanCircuit;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.dashboard.main')]
class KanbanCircuit extends Component
{

    public ?int $month = null;
    public KanbanCircuitForm $form;

    public function render()
    {
        return view('livewire.admin.kanban-circuit');
    }

    public function save(){
        $this->form->store();
        $this->dispatch('pg:eventRefresh-default')->to(KanbanCircuitTable::class);
    }

    public function delete(ModelsKanbanCircuit $kanban){
        $kanban->delete();
        $this->dispatch('pg:eventRefresh-default')->to(KanbanCircuitTable::class);
    }


}
