<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Return searchable array for laravel scout
     *
     * @return array<string, float|int|string>
     */
    public function toSearchableArray()
    {
        return [
            'id' => (int) $this->id,
            'operateur' => $this->operateur,
            'annee' => (int) $this->annee,
            'filiere' => $this->filiere,
            'libelle_categorie_consommation' => $this->libelle_categorie_consommation,
            'libelle_grand_secteur' => $this->libelle_grand_secteur,
            'conso' => (string) $this->conso,
            'pdl' => (int) $this->pdl,
            'libelle_region' => $this->libelle_region,
            'code_region' => $this->code_region,
        ];
    }

    /**
     * returns all the different categories
     *
     * @param Builder $query
     * @return array<string>
     */
    public function scopeCategory($query)
    {
        return $query->select('libelle_categorie_consommation')->distinct()->get()->pluck('libelle_categorie_consommation')->toArray();
    }

        /**
     * returns all the different filieres
     *
     * @param Builder $query
     * @return array<string>
     */
    public function scopeFiliere($query)
    {
        return $query->select('filiere')->distinct()->get()->pluck('filiere')->toArray();
    }

        /**
     * returns all the different secteurs
     *
     * @param Builder $query
     * @return array<string>
     */
    public function scopeSecteur($query)
    {
        return $query->select('libelle_grand_secteur')->distinct()->get()->pluck('libelle_grand_secteur')->toArray();
    }
}
