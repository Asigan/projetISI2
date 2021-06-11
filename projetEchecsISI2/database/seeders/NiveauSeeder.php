<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayNiveaux = array(0, 800, 1200, 1800, 2000, 2300, 2500);
        $arrayTitres = array("total debutant", "débutant", "intermédiaire", "avancé", "maître international", "grand maître");
        
        
        
        for($i=0; $i<6; $i++){
            $eloMin = $arrayNiveaux[$i];
            $titre = $arrayTitres[$i];
            $index = $i +1;
            $eloMax = 4000;
            if($index < count($arrayNiveaux)){
                $eloMax = $arrayNiveaux[$index];
            }
            \App\Models\Niveau::factory()->create([
                'nom'=>$titre,
                'eloMin'=>$eloMin,
                'eloMax'=>$eloMax
            ]);
        }
        
    }
}
