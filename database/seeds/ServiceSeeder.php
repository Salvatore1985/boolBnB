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
            'has_elevator',
            'has_tv',
            'has_hotTub',
            'has_kitchen',
            'has_wifi',
            'car_parking',
            'has_swimming_pool',
            'has_sauna',
            'has_gym',
            'sea_view',
            'allows_animals',
            'has_reception'
        ];

        for ($i=0; $i < count($services); $i++){
            $newService = new Service;
            $newService->name = $services[$i];
            $newService->save();
        };
    }
}
