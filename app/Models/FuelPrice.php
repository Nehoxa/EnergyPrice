<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'prix_id',
        'prix_valeur',
        'prix_nom',
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
}
