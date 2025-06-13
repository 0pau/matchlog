<?php

namespace App\Livewire;

use Livewire\Component;

class CompetitionCard extends Component
{

    public $comp;

    public function render()
    {
        return view('livewire.competition-card');
    }
}
