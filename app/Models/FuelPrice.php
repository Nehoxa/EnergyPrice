<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FuelPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'pump',
        'cp',
        'pop',
        'adresse',
        'ville',
        'horaires',
        'geom',
        'prix_maj',
        'fuel_type_id',
        'prix_valeur',
        'com_arm_code',
        'com_arm_name',
        'epci_code',
        'epci_name',
        'dep_code',
        'dep_name',
        'reg_code',
        'reg_name',
        'com_code',
        'com_name',
        'services_service',
        'horaires_automate_24_24',
    ];

    /**
     * @var array<string, string>
     * */
    protected $cast = [
        'prix_valeur' => 'decimal',
        'prix_maj' => 'datetime',
    ];

    public function fuleType(): HasOne
    {
        return $this->hasOne(FuelType::class);
    }
}
