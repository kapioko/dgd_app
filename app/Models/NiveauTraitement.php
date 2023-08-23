<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TempsTraitement;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\NiveauTraitement;

class NiveauTraitement extends Model
{
    use HasFactory;

    protected $table = 'niveauTraitements';
    protected $guarded = [];

    protected $fillable=[
        'id',
        'nomNiveau',
        'idTempsTraitement'
    ];


    public function tempsTraitement(): BelongsTo
    { 
        return $this->belongsTo(TempsTraitement::class); 
    }

    public function users()
    {
        return $this->belongsToMany(Users::class, 'users_niveautraitements', 'idUser', 'idNiveauTraitement');
    }
}
