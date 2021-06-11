<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisateur extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nom',
    ];

    public function tournois(){
        return $this->hasMany(Tournoi::class);
    }
}
