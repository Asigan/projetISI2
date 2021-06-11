<?php

namespace Database\Factories;

use App\Models\Ouverture;
use Illuminate\Database\Eloquent\Factories\Factory;

class OuvertureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ouverture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->word,
            'premiersCoups'=>$this->faker->text(40),
            'ouverture_id'=>null,
        ];
    }
}
