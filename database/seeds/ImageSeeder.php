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
        $photos=[
            "https://exceedrental.com/images/Appartement_3/app3-p-living-room-large.jpg",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2owPBYkQrqObUy6VcB628B4PBUAEb30S-IvuZ4sG-0sLYxm2Y7tWXB4j3N1SbQZKnVnI&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHinvzT7rnEhIVKTukhjeFm-yRIRBEe6ZgDH8Sn1tw-9KhPy_wq7wq1cUW1bycVp0PoZo&usqp=CAU",
            "https://www.wilderkaiser.info/feratel/room/appartment-nina-maximilian1.jpg",
            "https://cf.bstatic.com/images/hotel/840x460/336/336786379.jpg",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZUaX5tNY0G-SgemEIK5IS88tn1iYCoF-hiUco6m1XwotrKulT_IGP-CTpQ9jmZhhKpbw&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMDpC--rYtGrZAcPwC70CPgJJmmV67-XfpZg&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVz8TncxlY7MuaHjvdOE6kycszYhUtKTcQTA&usqp=CAU",
            "https://homeworlddesign.com/wp-content/uploads/2016/04/Habitat-67-Minimalist-Apartment-Design-in-Montreal-5.jpg",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJATQ3QLWqILvddZqUpk-6KsnI42yKtPcrCg&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc69qe3UqYQhmEqR7vMyjyRoPGcWXoEJk0qQ&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRA1ETLL3kvJe62K9UzM6QZV4WnQQUPscAv4Q&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS74ashGiQ_hosORKVuEfSAkrd6MQ7b-rdz3g&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvhCCVHL1983ohKpyiP6sjvTkHjCiv-pIJHQ&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdcHG333gnwvwDCrp0gP6OiVPWOPx5aiJNCw&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvu08-PuG-D5GKq53qV8Vz8LI529QWR7isvQ&usqp=CAU",
            "https://rentals.agrasoyrealty.com/wp-content/uploads/2021/04/IMG_0068-536x370.jpg",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSH2BGkDv0C_dh3HuBhBh6uNZ88-CUqen6ehfVFjxEQfJSgRoZKap05AeNahuyMnfBUGhs&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjlN2P7dE4gKiZ-qclUJ5tujDPLcJnNwXmqw&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVqNMndpIhl-T_Ng_2Z21Gb60VOBdgrTiSPg&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiG61xboDzruzHuDBjuTIM1pwCMSwRVodcHg&usqp=CAU"



        ];

        $apartmentIds = Apartment::pluck('id')->toArray();
        for ($i=0; $i < Count($photos); $i++) {
            $newImage = new Image;
            $newImage->link = $photos[$i] ;
            $newImage->apartment_id = $faker->randomElement($apartmentIds);
            $newImage->save();
        }
    }
}
