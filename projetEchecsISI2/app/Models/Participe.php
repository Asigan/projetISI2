<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participe extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'joueur_id',
        'tournoi_id',
        'score',
    ];
    
}
