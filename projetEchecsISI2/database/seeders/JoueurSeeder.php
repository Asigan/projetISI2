<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JoueurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Joueur::factory(10)->create();
    }
}
