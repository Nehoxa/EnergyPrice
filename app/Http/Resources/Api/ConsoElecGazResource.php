<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ConsoElecGaz;

/** @mixin ConsoElecGaz */

class ConsoElecGazResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, float|int|string|null>|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'operateur' => $this->operateur,
            'annee' => $this->annee,
            'filiere' => $this->filiere,
            'codeCategorieConsommation' => $this->code_categorie_consommation,
            'libelleCategorieConsommation' => $this->libelle_categorie_consommation,
            'codeGrandSecteur' => $this->code_grand_secteur,
            'libelleGrandSecteur' => $this->libelle_grand_secteur,
            'codeNaf' => $this->code_naf,
            'libelleSecteurNaf2' => $this->libelle_secteur_naf2,
            'conso' => $this->conso,
            'pdl' => $this->pdl,
            'indqual' => $this->indqual,
            'nombreMaillesSecretisees' => $this->nombre_mailles_secretisees,
            'codeRegion' => $this->code_region,
            'libelleRegion' => $this->libelle_region,
        ];
    }
}
