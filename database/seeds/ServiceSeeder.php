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
        $servicesAwesome = [
            'fa-solid fa-elevator',
            'fa-solid fa-tv',
            'fa-solid fa-hot-tub-person',
            'fa-solid fa-kitchen-set',
            'fa-solid fa-wifi />',
            'fa-solid fa-square-parking',
            'fa-solid fa-person-swimming',
            'fa-solid fa-spa',
            'fa-solid fa-dumbbell',
            'fa-solid fa-water',
            'fa-solid fa-paw',
            'fa-solid fa-bell-concierge'
        ];

        for ($i=0; $i < count($services); $i++){
            $newService = new Service;
            $newService->name = $services[$i];
            $newService->link = $servicesAwesome[$i];
            $newService->save();
        };
    }
}
