<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    /** @use HasFactory<\Database\Factories\CompetitorFactory> */
    use HasFactory;

    protected $fillable = ['name', 'birth', 'address'];

    public $timestamps = false;
}
