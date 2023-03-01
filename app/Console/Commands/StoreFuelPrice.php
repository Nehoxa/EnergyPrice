<?php

namespace App\Console\Commands;

use App\Models\FuelPrice;
use App\Models\FuelType;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StoreFuelPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:fuelPrice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enregistre les prix de vente de carburant';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $worksheet = $this->getActiveSheet(storage_path('data/prixCarburants.csv'));

        $counter = 0;

        /** @phpstan-ignore-next-line */
        $types = FuelType::all()->pluck('name', 'id');

        foreach ($worksheet->getRowIterator() as $row) {
            if ($counter++ === 0) {
                continue;
            }

            $cellIterator = $row->getCellIterator();

            $cells = [];

            foreach ($cellIterator as $cell) {
                $cells[] = $cell->getValue();
            }

            if (!is_null($cells[8]) && !$types->has($cells[8])) {
                FuelType::create([
                    'id' => $cells[8],
                    'name' => $cells[10]
                ]);

                $types[$cells[8]] = $cells[10];
            }


            if (!is_null($cells[8])) {
                FuelPrice::create([
                    'pump' => $cells[0],
                    'cp' => $cells[1],
                    'pop' => $cells[2],
                    'adresse' => $cells[3],
                    'ville' => $cells[4],
                    'horaires' => $cells[5],
                    'geom' => $cells[6],
                    'prix_maj' => $cells[7],
                    'fuel_type_id' => $cells[8],
                    'prix_valeur' => $cells[9],
                    'com_arm_code' => $cells[11],
                    'com_arm_name' => $cells[12],
                    'epci_code' => $cells[13],
                    'epci_name' => $cells[14],
                    'dep_code' => $cells[15],
                    'dep_name' => $cells[16],
                    'reg_code' => $cells[17],
                    'reg_name' => $cells[18],
                    'com_code' => $cells[19],
                    'com_name' => $cells[20],
                    'services_service' => $cells[21],
                    'horaires_automate_24_24' => $cells[22],
                ]);
            }
        }

        $this->comment('Prix enregistrés avec succès');
    }

    private function getActiveSheet(string $path): Worksheet
    {
        return (new Csv())
            ->load($path)
            ->getActiveSheet();
    }
}
