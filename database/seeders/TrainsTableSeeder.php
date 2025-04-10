<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;
use Faker\Generator as Faker;


class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        // $trains = [
        //     [
        //         'azienda' => 'Trenitalia',
        //         'stazione_di_partenza' => 'Roma Termini',
        //         'stazione_di_arrivo' => 'Milano Centrale',
        //         'partenza' => '2025-04-09 08:00:00',
        //         'arrivo' => '2025-04-09 12:00:00',
        //         'codice_treno' => 1011,
        //         'totale_carrozze' => 10,
        //         'puntuale' => 1,
        //         'cancellato' => 0,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'azienda' => 'Italo',
        //         'stazione_di_partenza' => 'Napoli Centrale',
        //         'stazione_di_arrivo' => 'Torino Porta Nuova',
        //         'partenza' => '2025-04-09 07:30:00',
        //         'arrivo' => '2025-04-09 13:30:00',
        //         'codice_treno' => 1012,
        //         'totale_carrozze' => 12,
        //         'puntuale' => 1,
        //         'cancellato' => 0,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ];

        // foreach($trains as $train){


        //     $newTrain= new Train();
    
        //     $newTrain->azienda=$train['azienda'];
        //     $newTrain->stazione_di_partenza=$train['stazione_di_partenza'];
        //     $newTrain->stazione_di_arrivo=$train['stazione_di_arrivo'];
        //     $newTrain->partenza=$train['partenza'];
        //     $newTrain->arrivo=$train['arrivo'];
        //     $newTrain->codice_treno=$train['codice_treno'];
        //     $newTrain->totale_carrozze=$train['totale_carrozze'];
        //     $newTrain->puntuale=$train['puntuale'];
        //     $newTrain->cancellato=$train['cancellato'];    
    
        //     $newTrain->save();
        // }

        $stazioni = [
            'Roma Termini',
            'Milano Centrale',
            'Napoli Centrale',
            'Torino Porta Nuova',
            'Firenze Santa Maria Novella',
            'Venezia Santa Lucia',
            'Bologna Centrale',
            'Verona Porta Nuova',
            'Genova Brignole',
            'Palermo Centrale',
        ];
    
        
        
        for($i=0; $i<200;$i++){


            $partenza = $faker->randomElement($stazioni);
            do {
                $arrivo = $faker->randomElement($stazioni);
            } while ($arrivo === $partenza);



            $newTrain= new Train();
            
            $newTrain->azienda = $faker->randomElement(['Trenitalia', 'Italo', 'Trenord', 'Freccia Rossa']);
            $newTrain->stazione_di_partenza = $partenza;
            $newTrain->stazione_di_arrivo = $arrivo;
            $newTrain->partenza = $faker->dateTimeBetween('now', '+1 days');
            $newTrain->arrivo = $faker->dateTimeBetween('+1 days', '+2 days');
            $newTrain->codice_treno = $faker->unique()->numberBetween(1013, 9999);
            $newTrain->totale_carrozze= $faker->randomNumber(2, true);
            $newTrain->puntuale = $faker->boolean();
            $newTrain->cancellato = $faker->boolean(20);    
    
            $newTrain->save();

        }



    
    }
}
