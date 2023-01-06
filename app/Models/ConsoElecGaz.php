<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsoElecGaz extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'operateur',
        'annee',
        'filiere',
        'code_categorie_consommation',
        'libelle_categorie_consommation',
        'code_grand_secteur',
        'libelle_grand_secteur',
        'code_naf',
        'libelle_secteur_naf2',
        'conso',
        'pdl',
        'indqual',
        'nombre_mailles_secretisees',
        'code_region',
        'libelle_region',
    ];

    /**
     * @var array<string, string>
     * */
    protected $cast = [
        'conso' => 'decimal',
        'indiqual' => 'decimal'
    ];
}
