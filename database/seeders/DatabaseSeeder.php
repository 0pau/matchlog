<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createUsers();
    }

    public function createUsers() {
        //Adminisztrátor
        User::create([
            "email"=> "admin@matchlog.io",
            "password"=>Hash::make("admin"),
            "is_admin"=>true
        ]);
        //Sima felhasználók, aki nem rendelkeznek adminisztrátori jogosultsággal
        for ($i = 0; $i < 10; $i++) {
            User::create([
                "email"=> "user".$i."@matchlog.io",
                "password"=>Hash::make("user".$i),
            ]);
        }

    }
}
