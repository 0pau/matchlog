<?php

namespace App\Livewire;

use Livewire\Component;

class CompetitorCard extends Component
{

    public $competitor;
    public function render()
    {
        return view('livewire.competitor-card');
    }
}
