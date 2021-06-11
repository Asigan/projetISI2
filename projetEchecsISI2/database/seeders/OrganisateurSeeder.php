<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrganisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Organisateur::factory(3)->create();
    }
}
