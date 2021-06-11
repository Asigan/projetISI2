<?php

namespace Database\Factories;

use App\Models\Tournoi;
use App\Models\Niveau;
use App\Models\Organisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournoiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tournoi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'nom'=> $faker->streetName,
            'date'=> $faker->date,
            'adresse'=> $faker->address,
            'classement'=> $faker->text(20),
            'niveau_id'=> Niveau::all()->random()->id,
            'organisateur_id'=> Organisateur::all()->random()->id,
        ];
    }
}
