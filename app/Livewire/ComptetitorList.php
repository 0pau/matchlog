<?php

namespace App\Livewire;

use App\Models\Competitor;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ComptetitorList extends Component
{

    public $editMode = false;
    public $editedCompetitorId = -1;
    public $new_name = "";
    public $new_birth = "";
    public $new_address = "";

    protected $listeners = ["competitorDeleted"=> '$refresh', "editRequested"=> "startEditMode"];

    public function startEditMode($id) {
        $this->editMode = true;
        $this->editedCompetitorId = $id;
        $selectedCompetitor = Competitor::find($id);
        $this->new_name = $selectedCompetitor->name;
        $this->new_birth = $selectedCompetitor->birth;
        $this->new_address = $selectedCompetitor->address;
        $this->js('$js.show_dialog();');
    }

    public function add_new() {
        $this->editMode = false;
        $this->editedCompetitorId = -1;
        $this->new_name = "";
        $this->new_birth = "";
        $this->new_address = "";
        $this->js('$js.show_dialog();');
    }

    public function render()
    {
        return view('livewire.comptetitor-list');
    }

    public function save_new() {
        if (trim($this->new_name) == "" || trim($this->new_birth) == "" || trim($this->new_address) == "") {
            return "Minden mező kitöltése kötelező.";
        }
        try {
            if ($this->editMode) {
                Competitor::query()->find($this->editedCompetitorId)->update(
                    ["name"=>$this->new_name, "birth"=>$this->new_birth, "address"=>$this->new_address]
                );
                $this->dispatch("dataUpdated");
            } else {
                Competitor::create(["name"=>$this->new_name, "birth"=>$this->new_birth, "address"=>$this->new_address]);
            }
        } catch (\Exception $e) {
            return "Hiba történt a mentés során.";
        }

        return true;
    }
}
