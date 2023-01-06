<?php

namespace App\Filters;

class FuelPriceFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'pumpid' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'pop' => ['eq', 'ne'],
        'ville' => ['eq', 'ne'],
        'prixmaj' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'prixid' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'prixvaleur' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'prixnom' => ['eq', 'ne'],
        'comarmcode' => ['eq', 'ne'],
        'comarmname' => ['eq', 'ne'],
        'epcicode' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'epciname' => ['eq', 'ne'],
        'depcode' => ['eq', 'ne'],
        'depname' => ['eq', 'ne'],
        'regcode' => ['eq', 'ne'],
        'comcode' => ['eq', 'ne'],
        'comname' => ['eq', 'ne'],
        'horairesautomate24_24' => ['eq', 'ne'],
    ];

    protected $columnMap = [
        'pumpid' => 'pump',
        'prixmaj' => 'prix_maj',
        'prixid' => 'prix_id',
        'prixvaleur' => 'prix_valeur',
        'prixnom' => 'prix_nom',
        'comarmcode' => 'com_arm_code',
        'comarmname' => 'com_arm_name',
        'epcicode' => 'epci_code',
        'epciname' => 'epci_name',
        'depcode' => 'dep_code',
        'depname' => 'dep_name',
        'regcode' => 'reg_code',
        'comcode' => 'com_code',
        'comname' => 'com_name',
        'horairesautomate24_24' => 'horaires_automate_24_24',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];
}
