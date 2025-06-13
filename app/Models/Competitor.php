<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    /** @use HasFactory<\Database\Factories\CompetitorFactory> */
    use HasFactory;

    public $timestamps = false;
}
