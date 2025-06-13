<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
