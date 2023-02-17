<?php

namespace App\Enums;

enum ConsoSecteur: String
{
    case Industrie = 'Industrie';
    case Agriculture = 'Agriculture';
    case Résidentiel = 'Résidentiel';
    case Tertiaire = 'Tertiaire';
    case SI = 'Secteur Inconnu';
}
