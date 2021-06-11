<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NiveauSeeder::class);
        $this->call(JoueurSeeder::class);
        $this->call(OrganisateurSeeder::class);
        $this->call(OuvertureSeeder::class);
        $this->call(TournoiSeeder::class);
        $this->call(ParticipeSeeder::class);
        $this->call(PartieSeeder::class);
    }
}
