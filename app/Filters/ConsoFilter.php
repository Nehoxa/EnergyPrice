<?php

namespace App\Filters;

class ConsoFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'operateur' => ['eq', 'ne'],
        'annee' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'filiere' => ['eq', 'ne'],
        'codecategorieconsommation' => ['eq', 'ne'],
        'libellecategorieconsommation' => ['eq', 'ne'],
        'codegrandsecteur' => ['eq', 'ne'],
        'libellegrandsecteur' => ['eq', 'ne'],
        'conso' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'pdl' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'indqual' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'nombremaillessecretisees' => ['lt', 'let', 'eq', 'gt', 'gte', 'ne'],
        'coderegion' => ['eq', 'ne'],
    ];

    /**
     * @return array<string, string>
     * */
    protected $columnMap = [
        'codecategorieconsommation' => 'code_categorie_consommation',
        'libellecategorieconsommation' => 'libelle_categorie_consommation',
        'codegrandsecteur' => 'code_grand_secteur',
        'libellegrandsecteur' => 'libelle_grand_secteur',
        'nombremaillessecretisees' => 'nombre_mailles_secretisees',
        'coderegion' => 'code_region',
    ];

    /**
     * @return array<string, string>
     * */
    protected $operatorMap = [
        'lt' => '<',
        'lte' => '<=',
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
    ];
}
