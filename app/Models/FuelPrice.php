<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FuelPrice extends Model
{
    use HasFactory;
    use Searchable;

    protected $primaryKey = 'id';

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

    /**
     * return default index for laravel scout
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'fuelprices_index';
    }

    /**
     * Return searchable array for laravel scout
     *
     * @return array<string, float|int|string|null>
     */
    public function toSearchableArray(): array
    {
        return [
            'pump' => (int) $this->pump,
            'cp' => (int) $this->cp,
            'fuel_type_id' => (int) $this->fuel_type_id,
            'ville' => $this->ville,
            'prix_valeur' => (float) $this->prix_valeur,
            'dep_name' => $this->dep_name,
            'dep_code' => (int) $this->dep_code,
            'reg_name' => $this->reg_name,
        ];
    }

    /**
     * retrun defalut key for laravel scout
     *
     * @return int|null
     */
    public function getScoutKey()
    {
        return $this->pump;
    }

    public function fuelType(): HasOne
    {
        return $this->hasOne(FuelType::class);
    }
}
