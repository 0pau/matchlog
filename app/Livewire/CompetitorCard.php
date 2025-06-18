<?php

namespace App\Livewire;

use Livewire\Component;

class CompetitorCard extends Component
{

    public $isBeingEdited = false;

    public $competitor;
    public function edit() {
        $this->isBeingEdited = true;
    }
    public function render()
    {
        return view('livewire.competitor-card');
    }
}
