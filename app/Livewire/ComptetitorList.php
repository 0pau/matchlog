<?php

namespace App\Livewire;

use App\Models\Competitor;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ComptetitorList extends Component
{

    public $new_name = "";
    public $new_birth = "";
    public $new_address = "";

    public function render()
    {
        return view('livewire.comptetitor-list');
    }

    public function save_new() {
        if (trim($this->new_name) == "" || trim($this->new_birth) == "" || trim($this->new_address) == "") {
            return "Minden mező kitöltése kötelező.";
        }
        try {
            Competitor::create(["name"=>$this->new_name, "birth"=>$this->new_birth, "address"=>$this->new_address]);
        } catch (\Exception $e) {
            return "Hiba történt a mentés során.";
        }
        return true;
    }


    #[Computed()]
    public function get_competitors() {
        return Competitor::all();
    }
}
