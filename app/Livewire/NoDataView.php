<?php

namespace App\Livewire;

use Livewire\Component;

class NoDataView extends Component
{

    public $title = "Ez a lista üres";
    public $hint = "";

    public function render()
    {
        return view('livewire.no-data-view');
    }
}
