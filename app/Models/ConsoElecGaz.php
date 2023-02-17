<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsoElecGaz extends Model
{
    use HasFactory;
    use Searchable;

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

    public function toSearchableArray()
    {
        return [
            'id' => (int) $this->id,
            'operateur' => $this->operateur,
            'annee' => (int) $this->annee,
            'filiere' => $this->filiere,
            'libelle_categorie_consommation' => $this->libelle_categorie_consommation,
            'libelle_grand_secteur' => $this->libelle_grand_secteur,
            'conso' => (float) $this->conso,
            'pdl' => (int) $this->pdl,
            'libelle_region' => $this->libelle_region,
            'code_region' => $this->code_region,
        ];
    }

    public function scopeCategory($query)
    {
        return $query->select('libelle_categorie_consommation')->distinct()->get()->pluck('libelle_categorie_consommation')->toArray();
    }

    public function scopeFiliere($query)
    {
        return $query->select('filiere')->distinct()->get()->pluck('filiere')->toArray();
    }

    public function scopeSecteur($query)
    {
        return $query->select('libelle_grand_secteur')->distinct()->get()->pluck('libelle_grand_secteur')->toArray();
    }
}
