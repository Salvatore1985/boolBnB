<?php

use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\Service;
use Faker\Generator as Faker;

class ApartmentServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $serviceIds = Service::pluck('id')->toArray();
        $apartments = Apartment::all();
        foreach ($apartments as $apartment) {
            $apartment->services()->sync($faker->randomElements($serviceIds, 2));
        }
    }
}
