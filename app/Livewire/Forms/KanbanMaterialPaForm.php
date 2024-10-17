<?php

namespace App\Livewire\Forms;

use App\Models\KanbanMaterialPa;
use Livewire\Form;

class KanbanMaterialPaForm extends Form
{
    public ?string $lokasi = '';
    public ?string $month = '';
    public ?string $part_number = '';
    public ?string $part_address = '';
    public ?string $issue = '';
    public ?string $wip = '';

    public function store(){
        KanbanMaterialPa::create($this->all());
        $this->reset();
    }
}
