<?php

namespace App\Livewire;

use App\Models\Competition;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Main extends Component
{

    #[Validate('required')]
    public $new_name = "";
    public $new_year = 0;
    #[Validate('required')]
    public $new_theme = "";
    public $new_p_correct = 1;
    public $new_p_incorrect = 0;
    public $new_p_empty = 0;

    public $competitions = [];

    public function boot()
    {
        $this->new_year = date('Y');
        $this->get_competitions();
    }

    public function save_new() {
        try {
            Competition::create([
                "name" => $this->new_name,
                "year" => $this->new_year,
                "theme" => $this->new_theme,
                "p_correct" => $this->new_p_correct,
                "p_empty" => $this->new_p_empty,
                "p_incorrect" => $this->new_p_incorrect
            ]);
        } catch (\Exception $e) {
            $this->js('showSnackBar("A verseny mentése nem sikerült. Ellenőrizze, hogy a név és év kombinációja egyedi -e!", 4000);');
            return false;
        }
        return true;
    }

    #[Computed()]
    public function get_competitions() {
        return Competition::orderBy('year', 'desc')
            ->orderBy('name', 'asc')
            ->get();
        //return Competition::all();
    }

    public function render()
    {
        return view("main");
    }
}
