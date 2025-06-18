<?php

namespace App\Livewire;

use App\Models\Competition;
use App\Models\Round;
use http\Env\Request;
use Livewire\Component;

class CompetitionInfoPage extends Component
{

    public $competition;
    public $newRoundName = "";
    public $id=0;
    public $roundSortColumn = "name";

    public function delete()
    {
        $this->competition->delete();
        $this->redirect("/", navigate: true);
    }

    public function deleteRound($round_id) {
        Round::query()->where('id', $round_id)->delete();
    }

    public function addNewRound() {
        Round::create([
            "name"=>$this->newRoundName,
            "competition_id"=>$this->id
        ]);
        $this->newRoundName = "";
    }

    public function setRoundSortColumn(string $roundSortColumn): void
    {
        $this->roundSortColumn = $roundSortColumn;
    }

    public function mount($id)
    {
        $this->id = $id;
        $this->competition = Competition::find($id);
    }

    public function render()
    {
        return view('livewire.competition-info-page');
    }
}
