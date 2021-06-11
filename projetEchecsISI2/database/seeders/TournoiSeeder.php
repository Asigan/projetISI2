<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TournoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tournoi::factory(10)->create();
    }
}
