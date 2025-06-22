<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Round extends Model
{
    /** @use HasFactory<\Database\Factories\RoundFactory> */
    use HasFactory;

    protected $fillable = [
        "name", "date", "competition_id"
    ];

    public $timestamps = false;


    public function competition() : BelongsTo
    {
        return $this->belongsTo(Competition::class, "competition_id");
    }

    public function competitors() : BelongsToMany {
        return $this->belongsToMany(Competitor::class, 'part_of',  'round_id', 'competitor_id');
    }

    public function addCompetitor($comp_id) {
        DB::table("part_of")->insert(["round_id" => $this->id, "competitor_id" => $comp_id]);
    }

    public function hasCompetitor($comp_id) {

        foreach ($this->competitors()->get() as $competitor) {
            if ($competitor->id == $comp_id) {
                return true;
            }
        }

        return false;
    }

    public function getCompetitorListString() {
        $names = [];
        foreach ($this->competitors()->get() as $item) {
            $names[] = $item->name;
        }
        return implode(", ", $names);
    }
}
