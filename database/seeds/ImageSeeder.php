<?php

use Illuminate\Database\Seeder;
use App\Models\Appartment;
use App\Models\Image;
class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartmentIds = Apartment::pluck('id')->toArray();
        for ($i=0; $i < 5; $i++) {
            $newImage = new Image;
            $newImage->link = 'https://picsum.photos/rand(1,100)/237/200/300'; // TO BE LOOKED AT
            $newImage->apartment_id = $apartmentIds[$i];
            $newImage->save();
        }
    }
}
