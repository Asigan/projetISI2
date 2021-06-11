<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParticipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Participe::factory(20)->create();
    }
}
