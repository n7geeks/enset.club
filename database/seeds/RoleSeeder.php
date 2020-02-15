<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'guard_name' => 'web',
                'name' => 'admin',
            ], [
                'guard_name' => 'web',
                'name' => 'president',
            ],
        ]);
    }
}
