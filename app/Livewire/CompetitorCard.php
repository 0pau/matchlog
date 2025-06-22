<?php

namespace App\Livewire;

use Livewire\Component;

class CompetitorCard extends Component
{

    public $competitor;

    protected $listeners = ["dataUpdated"=>'$refresh'];

    public function delete() {
        $this->competitor->delete();
        $this->dispatch("competitorDeleted");
    }
    public function requestEdit() {
        $this->dispatch("editRequested", id: $this->competitor->id);
    }
    public function render()
    {
        return view('livewire.competitor-card');
    }
}
