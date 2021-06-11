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
        $tournoi = Tournoi::all()->random();
        while(count($tournoi->joueurs)<2){
            $tournoi = Tournoi::all()->random();
        }
        $joueur1 = $tournoi->joueurs->random();
        $joueur2 = $tournoi->joueurs->random();
        while($joueur1->id == $joueur2->id){
            $joueur2 = $tournoi->joueurs->random();
        }
        return [
            'date'=>$this->faker->dateTime,
            'tournoi_id'=> $tournoi->id,
            'joueur1_id'=> $joueur1->id,
            'joueur2_id'=> $joueur2->id,
        ];
    }
}
