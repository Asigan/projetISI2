<?php

namespace Database\Factories;

use App\Models\Niveau;
use Illuminate\Database\Eloquent\Factories\Factory;

class NiveauFactory extends Factory
{
    private $arrayNiveaux = array(0, 800, 1200, 1800, 2000, 2300, 2500);
    private $arrayTitres = array("total debutant", "débutant", "intermédiaire", "avancé", "maître international", "grand maître");
    private $index = 0;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Niveau::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'nom'=>$faker->name,
            'eloMin'=>$faker->numberBetween(0, 3500),
            'eloMax'=>$faker->numberBetween(800, 4000),
        ];
    }
}
