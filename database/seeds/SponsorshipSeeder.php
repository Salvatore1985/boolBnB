<?php

use Illuminate\Database\Seeder;
use App\Models\Sponsorship;
class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                'name' => 'Bronze Sponsor',
                'period' => 24,
                'price' => 2.99
            ],
            [
                'name' => 'Silver Sponsor',
                'period' => 72,
                'price' => 5.99
            ],
            [
                'name' => 'Gold Sponsor',
                'period' => 144,
                'price' => 9.99
            ],
        ];

        for ($i=0; $i < count($sponsorships) ; $i++) {
            $newSponsorship = new Sponsorship;
            $newSponsorship->name = $sponsorships[$i]['name'];
            $newSponsorship->period = $sponsorships[$i]['period'];
            $newSponsorship->price = $sponsorships[$i]['price'];
            $newSponsorship->save();
        }
    }
}
