<?php

namespace App\Livewire\Forms;

use App\Models\KanbanCircuit;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KanbanCircuitForm extends Form
{

    public $lokasi = '';

    public $month = null;

    public $no_control = null;

    public $issue = null;

    public $wip = null;

    public function store()
    {

        KanbanCircuit::create($this->all());
       
        $this->reset();
    }
}
