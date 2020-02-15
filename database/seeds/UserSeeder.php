<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ], [
                'first_name' => 'User',
                'last_name' => 'User',
                'email' => 'user@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
        ]);

        User::find(1)->roles()->attach(Role::findByName( 'admin'));
        User::find(2)->roles()->attach(Role::findByName( 'president'));

        factory(User::class, 20)->create()->each(function (User $user) {
            $user->roles()->attach(Role::findByName( 'president'));
        });
    }
}
