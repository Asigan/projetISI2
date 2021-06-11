<?php

namespace Database\Factories;

use App\Models\Joueur;
use App\Models\Niveau;
use Illuminate\Database\Eloquent\Factories\Factory;

class JoueurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Joueur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'prenom' => $faker->firstname,
            'nom'=>$faker->lastname,
            'nationalite'=>$faker->state,
            'niveau_id'=>Niveau::all()->random()->id,
        ];
    }
}
