<?php

namespace App\Livewire\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.home.main')]
class Home extends Component
{

    public $menu = 'Kanban Circuit';
    public function render()
    {
        return view('livewire.home.home');
    }
}
