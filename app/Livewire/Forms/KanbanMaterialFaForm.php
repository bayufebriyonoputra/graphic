<?php

namespace App\Livewire\Forms;

use App\Models\KanbanMaterialFa as ModelsKanbanMaterialFa;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KanbanMaterialFaForm extends Form
{
    public ?string $lokasi = '';
    public ?string $month = null;
    public ?int $part_number = null;
    public ?int $part_address = null;
    public ?int $issue = null;
    public ?int $wip = null;

    public function store(){
        ModelsKanbanMaterialFa::create($this->all());
        $this->reset();
    }
}
