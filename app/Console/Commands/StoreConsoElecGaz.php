<?php

namespace App\Console\Commands;

use App\Models\ConsoElecGaz;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StoreConsoElecGaz extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:consoElecGaz';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enregistre les consomations electrique et de gaz';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $worksheet = $this->getActiveSheet(storage_path('data/conso-elec-gaz.csv'));

        $counter = 0;

        foreach ($worksheet->getRowIterator() as $row) {
            if ($counter++ === 0) {
                continue;
            }

            $cellIterator = $row->getCellIterator();

            $cells = [];

            foreach ($cellIterator as $cell) {
                $cells[] = $cell->getValue();
            }

            ConsoElecGaz::create([
                'operateur' => $cells[0],
                'annee' => $cells[1],
                'filiere' => $cells[2],
                'code_categorie_consommation' => $cells[3],
                'libelle_categorie_consommation' => $cells[4],
                'code_grand_secteur' => $cells[5],
                'libelle_grand_secteur' => $cells[6],
                'code_naf' => $cells[7],
                'libelle_secteur_naf2' => $cells[8],
                'conso' => $cells[9],
                'pdl' => $cells[10],
                'indqual' => $cells[11],
                'nombre_mailles_secretisees' => $cells[12],
                'code_region' => $cells[13],
                'libelle_region' => $cells[14],
            ]);
        }

        $this->comment('Conso enregistrés avec succès');
    }

    private function getActiveSheet(string $path): Worksheet
    {
        return (new Csv())
            ->load($path)
            ->getActiveSheet();
    }
}
