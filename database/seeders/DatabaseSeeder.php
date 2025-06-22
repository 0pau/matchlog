<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Competition;
use App\Models\Competitor;
use App\Models\Round;
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

        //Véletlenszerű versenyzők készítése

        $randomFirstNames = ["István", "Béla", "Anna", "József", "Katalin", "Ádám", "Éva", "Péter"];
        $randomLastNames = ["Magyar", "Horváth", "Kovács", "Minta", "Példa", "Versenyző", "Bajnok"];

        for ($i = 0; $i < 15; $i++) {
            Competitor::create([
                "name"=> $randomLastNames[rand(0, sizeof($randomLastNames)-1)]." ".$randomFirstNames[rand(0, sizeof($randomFirstNames)-1)],
                "birth"=> rand(1990, 2010)."-".rand(1,12)."-".rand(1,28),
                "address"=>"Ismeretlen"
            ]);
        }

        //Dummy verseny
        Competition::create([
            "name"=>"Bolyai matematikaverseny",
            "year"=>2025,
            "theme"=>"Matematika"
        ]);

        //Dummy verseny fordulója
        Round::create([
            "competition_id"=>1,
            "name"=>"Országos döntő",
            "date"=>"2025-03-14"
        ]);

    }
}
