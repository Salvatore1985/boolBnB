<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' => 'Salvo',
            'email' => 'sal@gmail.com',
            'password' => 'boolBnB',
            'date_of_birth' => '1995-01-20',
            'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',
            'username' => 'SalvoImpro',
            'phone_n' => '3336584526',
            ],
            [
            'name' => 'Feli',
            'email' => 'feli@gmail.com',
            'password' => 'boolBnB',
            'date_of_birth' => '1995-01-20',
            'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',
            'username' => 'Filly22',
            'phone_n' => '3336581546',
            ],
            [
                'name' => 'Airowl',
                'email' => 'airowl@gmail.com',
                'password' => 'boolBnB',
                'date_of_birth' => '1995-01-20',
                'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',
                'username' => 'Airowl-Owls',
                'phone_n' => '3345810546',
            ],
            [
                'name' => 'Thom',
                'email' => 'thom@gmail.com',
                'password' => 'boolBnB',
                'date_of_birth' => '1995-01-20',
                'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',
                'username' => 'Thom_Train',
                'phone_n' => '5445810546',
            ],
            [
                'name' => 'Simone',
                'email' => 'simo@gmail.com',
                'password' => 'boolBnB',
                'date_of_birth' => '1995-01-20',
                'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',
                'username' => 'Jesù-Christ',
                'phone_n' => '5445811680',
            ]
        ];
        for ($i=0; $i < count($users) ; $i++) {
            $newUser = new User;
            $newUser->name = $users[$i]['name'];
            $newUser->email = $users[$i]['email'];
            $newUser->password = Hash::make($users[$i]['password'] . $i);
            $newUser->phone_n = $users[$i]['phone_n'];
            $newUser->username = $users[$i]['username'];
            $newUser->date_of_birth = $users[$i]['date_of_birth'];
            $newUser->profile_photo = $users[$i]['profile_photo'];
            $newUser->save();
        }
    }
}
