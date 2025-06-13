<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competition extends Model
{
    /** @use HasFactory<\Database\Factories\CompetitionFactory> */
    use HasFactory;

    public $fillable = [
        "name", "year", "theme", "p_correct", "p_incorrect", "p_empty"
    ];

    public $attributes = [
        "theme" => "Nincs beállítva",
        "p_correct" => 1,
        "p_incorrect" => 0,
        "p_empty" => 0,
    ];

    public $timestamps = false;

    public function rounds(): HasMany {
        return $this->hasMany(Round::class);
    }

    public function getRoundsCount()
    {
        return $this->rounds()->count();
    }
}
