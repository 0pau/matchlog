<?php

namespace App\Livewire;

use App\Models\Round;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class RoundEditor extends Component
{
    #[Modelable]
    public $value = -1;
    public $round = null;

    public $name = "";
    public $date = "";

    protected $listeners = ["refreshData" => '$refresh'];

    public function boot()
    {
        if ($this->value != -1) {
            $this->round = Round::find($this->value);
            if ($this->round != null) {
                $this->name = $this->round->name;
                $this->date = $this->round->date;
            }
        }
    }

    public function addCompetitor($comp_id) {
        $this->round->addCompetitor($comp_id);
    }

    public function save()
    {
        $this->round = null;
        $this->value = -1;
        Round::where('id', $this->value)->update(
            ["name"=>$this->name, "date"=>$this->date]
        );
        $this->dispatch("roundEditDone");
    }
    public function render()
    {
        return view('livewire.round-editor');
    }
}
