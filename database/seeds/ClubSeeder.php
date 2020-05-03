<?php

use App\Club;
use App\User;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Club::insert([
            [
                'name' => 'Admin',
                'slogan' => '-',
                'description' => '-',
                'logo' => '-',
                'email' => '-',
                'phone_number' => '-',
                'president_id' => '1',
                'domain' => 'admin',
            ],
            [
                'name' => 'N7Geeks',
                'slogan' => 'We are the best moroccan IT club',
                'description' => 'Yes, yes we are the best',
                'logo' => 'https://via.placeholder.com/200x200.jpg?text=n7geeks',
                'email' => 'n7geeks@ensetm.club',
                'phone_number' => '0699999999',
                'president_id' => '2',
                'domain' => 'n7geeks',
            ],
            [
                'name' => 'Enactus',
                'slogan' => 'We are the best nonprofit club',
                'description' => 'Yes, we are also the best',
                'logo' => 'https://via.placeholder.com/200x200.jpg?text=enactus',
                'email' => 'enactus@ensetm.club',
                'phone_number' => '0699999999',
                'president_id' => '3',
                'domain' => 'enactus',
            ],
        ]);

        Club::findByDomain("admin")->users()->save(User::find(1));
        Club::findByDomain("n7geeks")->users()->save(User::find(2));
        Club::findByDomain("enactus")->users()->save(User::find(3));
    }
}
