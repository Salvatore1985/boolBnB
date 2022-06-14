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
        $apartmentsAdress =[['adress'=>'via verdi 16 milano',
                        'lat' =>'45.5258659',
                        'long'=>'9.3376131'],
                    ['adress'=>'via piave 12 milano',
                        'lat' =>'45.4442769',
                        'long'=>'9.0941081'],
                    ['adress'=>'via montepiana 24 milano',
                        'lat' =>'45.4300234',
                        'long'=>'9.246355'],
                    ['adress'=>'via venezia 84 milano',
                        'lat' =>'45.3882073',
                        'long'=>'9.1589497'],
                    ['adress'=>'via paolo da cannobio 2 milano',
                        'lat' =>'45.462129414164934',
                        'long'=>'9.190990579397749']
                    ];
        for($i= 0; $i < Count($apartmentsAdress); $i++){
            $apartments= new Apartment;
            $apartments->n_rooms=$faker->numberBetween(1, 5);
            $apartments->structure_type=$faker->randomElement(['casa indipendente','casolare','appartamento']);
            $apartments->description= $faker->text(100);
            $apartments->category= $faker->randomElement(['montagna','mare','foresta','campagna','lago','fiume']);
            $apartments->sqr_meters= $faker->numberBetween(10, 500);
            $apartments->n_beds= $faker->numberBetween(1, 10);
            $apartments->n_bathrooms= $faker->numberBetween(1, 5);
            $apartments->n_floor= $faker->numberBetween(1, 3);
            $apartments->title=$faker->words(10);
            $apartments->is_visible= $faker->boolean();
            $apartments->price= $faker->numberBetween(2,1000);
            $apartments->save();

        }

    }
}
