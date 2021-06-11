<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'prenom',
        'nom',
        'nationalite',
        'niveau',
    ];
    public function parties1()
    {
        return $this->hasMany(Partie::class, 'joueur1_id');
    }
    public function parties2()
    {
        return $this->hasMany(Partie::class, 'joueur2_id');
    }
    public function tournois(){
        return $this->belongsToMany(Tournoi::class, 'participes')->withPivot('participes');
    }
    public function niveau(){
        return $this->belongsTo(Niveau::class);
    }
}
