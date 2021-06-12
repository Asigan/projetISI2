<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'statut',
        'tournoi_id',
        'joueur1_id',
        'joueur2_id',
        'joueurgagne_id',
    ];

    public function tournoi()
    {
        return $this->belongsTo(Tournoi::class);
    }

    public function joueur1()
    {
        return $this->belongsTo(Joueur::class, 'joueur1_id');
    }

    public function joueur2()
    {
        return $this->belongsTo(Joueur::class, 'joueur2_id');
    }

    public function joueurgagne(){
        return $this->belongsTo(Joueur::class, 'joueurgagne_id');
    }

    public function ouverture()
    {
        return $this->belongsTo(Ouverture::class);
    }
    public function getStatut($status)
    {
        $STATUTS = [0=>'Plannifiée', 
                    1=>'Gagnee par '.$this->joueur1->nom.' '.$this->joueur1->prenom,
                    2=>'Gagnee par '.$this->joueur2->nom." ".$this->joueur2->prenom,
                    3=>'Nulle',
                    4=>'Annulée'];
        $nom_statut =  $STATUTS[$status];
        return $nom_statut;
    }
    public function status(){
       return $this->getStatut($this->statut);
    }
    
}
