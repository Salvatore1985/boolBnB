<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Ascensore',
            'Tv',
            'Vasca idromassaggio',
            'Cucina',
            'Wifi',
            'Parcheggio auto',
            'Piscina',
            'Sauna',
            'Palestra',
            'Vista sul mare',
            'permette Animali',
            'Portineria'
        ];

        for ($i=0; $i < count($services); $i++){
            $newService = new Service;
            $newService->name = $services[$i];
            $newService->save();
        };
    }
}
