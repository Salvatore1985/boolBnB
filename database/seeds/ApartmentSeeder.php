<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Apartment;
class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)

    {
        // $apartmentsAddress =[
        //     ['address'=>'via verdi 16 milano',
        //     'lat' =>'45.5258659',
        //     'long'=>'9.3376131'
        //     ],
        //     ['address'=>'via piave 12 milano',
        //     'lat' =>'45.4442769',
        //     'long'=>'9.0941081'
        //     ],
        //     ['address'=>'via montepiana 24 milano',
        //         'lat' =>'45.4300234',
        //         'long'=>'9.246355'
        //     ],
        //     ['address'=>'via venezia 84 milano',
        //         'lat' =>'45.3882073',
        //         'long'=>'9.1589497'
        //     ],
        //     ['address'=>'via paolo da cannobio 2 milano',
        //         'lat' =>'45.462129414164934',
        //         'long'=>'9.190990579397749'
        //     ]
        // ];
        for($i= 0; $i < 10; $i++){
            $newApartment = new Apartment;
            $newApartment->n_rooms=$faker->numberBetween(1, 5);
            // $newApartment->structure_type=$faker->randomElement(['casa indipendente','casolare','appartamento']);
            $newApartment->description= $faker->text(100);
            // $newApartment->category= $faker->randomElement(['montagna','mare','foresta','campagna','lago','fiume']);
            $newApartment->sqr_meters= $faker->numberBetween(10, 500);
            $newApartment->n_beds= $faker->numberBetween(1, 10);
            $newApartment->n_bathrooms= $faker->numberBetween(1, 5);
            $newApartment->n_floor= $faker->numberBetween(1, 3);
            $newApartment->title=$faker->words(10);
            $newApartment->is_visible= true;
            // $newApartment->address = $apartmentsAddress[$i]['address'];
            // $newApartment->lat = $apartmentsAddress[$i]['lat'];
            // $newApartment->long = $apartmentsAddress[$i]['long'];
            $newApartment->price= $faker->numberBetween(2,1000);
            $newApartment->save();

        }

    }
}
