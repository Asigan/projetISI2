<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PartieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Partie::factory(20)->create();
    }
}
