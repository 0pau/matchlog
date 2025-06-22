<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Competitor extends Model
{
    /** @use HasFactory<\Database\Factories\CompetitorFactory> */
    use HasFactory;

    protected $fillable = ['name', 'birth', 'address'];

    public $timestamps = false;

    public function removeFromRound($round_id) {
        DB::table('part_of')->where('round_id', $round_id)->where('competitor_id', $this->id)->delete();
    }
}
