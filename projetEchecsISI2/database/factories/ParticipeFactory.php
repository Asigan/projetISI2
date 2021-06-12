<?php

namespace Database\Factories;

use App\Models\Participe;
use App\Models\Joueur;
use App\Models\Tournoi;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Participe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tournoi = Tournoi::all()->random();
        $joueursnoninscrits = new Joueur;
        $exception = $tournoi->joueurs->pluck('id')->toArray();
        $joueurNonInscrit = $joueursnoninscrits->whereNotIn('id', $exception)->get()->random();
        return [
            'joueur_id'=> $joueurNonInscrit->id,
            'tournoi_id'=> $tournoi->id,
        ];
    }
}
