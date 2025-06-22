<?php

namespace App\Livewire;

use Livewire\Component;

class RoundParticipantListItem extends Component
{

    public $competitor;
    public $round_id = -1;

    public function removeSelf() {
        $this->competitor->removeFromRound($this->round_id);
        $this->dispatch("refreshData");
    }

    public function render()
    {
        return view('livewire.round-participant-list-item');
    }
}
