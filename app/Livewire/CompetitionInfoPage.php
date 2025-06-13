<?php

namespace App\Livewire;

use App\Models\Competition;
use http\Env\Request;
use Livewire\Component;

class CompetitionInfoPage extends Component
{

    public $competition;
    public $id=0;

    public function delete()
    {
        $this->competition->delete();
        $this->redirect("/", navigate: true);
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
