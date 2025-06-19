<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends \Illuminate\Foundation\Auth\User
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    //use HasFactory;

    protected $primaryKey = "email";
    protected $keyType = "string";
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        "email", "phone_number", "address", "is_admin", "password"
    ];

    public function getAuthIdentifierName() {
        return "email";
    }
}
