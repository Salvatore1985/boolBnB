<?php

use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\User;
use Faker\Generator as Faker;
class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $addresses = [
            [
                'address'=>'via verdi 16 milano',
                'lat' =>'45.5258659',
                'long'=>'9.3376131'
            ],
            [
                'address'=>'via piave 12 milano',
                'lat' =>'45.4442769',
                'long'=>'9.0941081'
            ],
            [
                'address'=>'via montepiana 24 milano',
                'lat' =>'45.4300234',
                'long'=>'9.246355'
            ],
            [
                'address'=>'via venezia 84 milano',
                'lat' =>'45.3882073',
                'long'=>'9.1589497'
            ],
            [
                'address'=>'Corso Como',
                'lat' =>'45.462129414164934',
                'long'=>'9.190990579397749'
            ],
            [
                'address'=>'via paolo da cannobio 2 milano',
                'lat' =>'45.462129414164934',
                'long'=>'9.190990579397749'
            ],
            [
                'address'=>'Via Como, Strada Provinciale 44bis',
                'lat' =>'45.462129414164934',
                'long'=>'9.190990579397749'
            ],
            [
                'address'=>'Via Como, Strada Provinciale 44bis & Corso Milano',
                'lat' =>'45.48138',
                'long'=>'9.18731'
            ],
            [
                'address'=>'Via Stalingrado Bologna',
                'lat' =>'44.51691',
                'long'=>'11.36396'
            ],
            [
                'address'=>'Via Stalingrado, 40016 San Giorgio di Piano',
                'lat' =>'44.64734',
                'long'=>'11.36656'
            ],
            [
                'address'=>'Via Ferrarese, 40127, 40128 Bologna',
                'lat' =>'44.52887',
                'long'=>'11.36691'
            ],
            [
                'address'=>'Via Stalingrado & Via Ferrarese, 40128 Bologna',
                'lat' =>'44.52991',
                'long'=>'11.36697'
            ],
       /*      [
                'address'=>'',
                'lat' =>'',
                'long'=>''
            ],
            [
                'address'=>'',
                'lat' =>'',
                'long'=>''
            ],
            [
                'address'=>'',
                'lat' =>'',
                'long'=>''
            ],
            [
                'address'=>'',
                'lat' =>'',
                'long'=>''
            ],
            [
                'address'=>'',
                'lat' =>'',
                'long'=>''
            ],
            [
                'address'=>'',
                'lat' =>'',
                'long'=>''
            ],
            [
                'address'=>'',
                'lat' =>'',
                'long'=>''
            ], */


        ];

        $userIds = User::pluck('id')->toArray();

        for ($i=1; $i < count($addresses) ; $i++) {
            $newApartment = new Apartment;
            $newApartment->user_id = $faker->randomElement($userIds);
            $newApartment->n_rooms=$faker->numberBetween(1, 5);
            $newApartment->description= $faker->paragraph();
            $newApartment->sqr_meters= $faker->numberBetween(10, 500);
            $newApartment->n_beds= $faker->numberBetween(1, 10);
            $newApartment->n_bathrooms= $faker->numberBetween(1, 5);
            $newApartment->n_floor= $faker->numberBetween(1, 3);
            $newApartment->title= $faker->word(10, true);
            $newApartment->is_visible= $faker->boolean();
            $newApartment->address = $addresses[$i]['address'];
            $newApartment->lat = $addresses[$i]['lat'];
            $newApartment->long = $addresses[$i]['long'];
            $newApartment->price= $faker->numberBetween(2,1000);
            $newApartment->save();

        }
    }
}

