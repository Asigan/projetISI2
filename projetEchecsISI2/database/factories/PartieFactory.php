<?php

namespace Database\Factories;

use App\Models\Partie;
use App\Models\Joueur;
use App\Models\Tournoi;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date'=>$this->faker->dateTime,
            'tournoi_id'=> Tournoi::all()->random()->id,
            'joueur1_id'=> Joueur::all()->random()->id,
            'joueur2_id'=> Joueur::all()->random()->id,
        ];
    }
}
