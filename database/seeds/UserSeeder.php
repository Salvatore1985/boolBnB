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
                'name' => 'Admin',
                'surname' => 'User',
                'email' => 'AdminBoolBnB@gmail.com',
                'password' => 'boolBnB',
                'date_of_birth' => '2022-06-12',
                'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',
            ],
            [
            'name' => 'Salvo',
            'surname' => 'surname',
            'email' => 'sal@gmail.com',
            'password' => 'boolBnB',
            'date_of_birth' => '1995-01-20',
            'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',

            ],
            [
            'name' => 'Feli',
            'surname' => 'surname',
            'email' => 'feli@gmail.com',
            'password' => 'boolBnB',
            'date_of_birth' => '1995-01-20',
            'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',
            ],
            [
                'name' => 'Airowl',
                'surname' => 'surname',
                'email' => 'airowl@gmail.com',
                'password' => 'boolBnB',
                'date_of_birth' => '1995-01-20',
                'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',
            ],
            [
                'name' => 'Thom',
                'surname' => 'surname',
                'email' => 'thom@gmail.com',
                'password' => 'boolBnB',
                'date_of_birth' => '1995-01-20',
                'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',
            ],
            [
                'name' => 'Simone',
                'surname' => 'surname',
                'email' => 'simo@gmail.com',
                'password' => 'boolBnB',
                'date_of_birth' => '1995-01-20',
                'profile_photo' => 'https://www.alamy.it/paperina-image69979434.html',
            ]
        ];

        for ($i=0; $i < count($users) ; $i++) {
            $newUser = new User;
            $newUser->name = $users[$i]['name'];
            $newUser->surname = $users[$i]['surname'];
            $newUser->email = $users[$i]['email'];
            $newUser->password = Hash::make($users[$i]['password'] . $i);
            $newUser->date_of_birth = $users[$i]['date_of_birth'];
            $newUser->save();
        }
    }
}
