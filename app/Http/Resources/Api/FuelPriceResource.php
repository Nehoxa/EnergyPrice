<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\FuelPrice;

/** @mixin FuelPrice */

class FuelPriceResource extends JsonResource
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
            'pumpId' => $this->pump,
            'cp' => $this->cp,
            'pop' => $this->pop,
            'adresse' => $this->adresse,
            'ville' => $this->ville,
            'prixMaj' => $this->prix_maj,
            'prixId' => $this->prix_id,
            'prixValeur' => $this->prix_valeur,
            'prixNom' => $this->prix_nom,
            'comArmCode' => $this->com_arm_code,
            'comArmName' => $this->com_arm_name,
            'epciCode' => $this->epci_code,
            'epciName' => $this->epci_name,
            'depCode' => $this->dep_code,
            'depName' => $this->dep_name,
            'regCode' => $this->reg_code,
            'regName' => $this->reg_name,
            'comCode' => $this->com_code,
            'comName' => $this->com_name,
            'servicesService' => $this->services_service,
            'horairesAutomate_24_24' => $this->horaires_automate_24_24,
        ];
    }
}
