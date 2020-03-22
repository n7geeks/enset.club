<?php

use Illuminate\Database\Seeder;
use RomegaDigital\Multitenancy\Models\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::insert([
            [
                'name' => 'Admin',
                'domain' => 'admin'
            ],
            [
                'name' => 'N7Geeks',
                'domain' => 'n7geeks'
            ],
            [
                'name' => 'Enactus',
                'domain' => 'enactus'
            ],
        ]);
    }
}
