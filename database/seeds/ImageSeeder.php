<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Apartment;
use App\Models\Image;
class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartmentIds = Apartment::pluck('id')->toArray();
        for ($i=0; $i < 10; $i++) {
            $newImage = new Image;
            $newImage->link = "https://picsum.photos/id/$i/250/400";
            $newImage->apartment_id = $faker->randomElement($apartmentIds);
            $newImage->save();
        }
    }
}
