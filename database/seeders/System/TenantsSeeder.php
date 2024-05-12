<?php

namespace Database\Seeders\System;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = [
            ['name' => 'tenant1', 'domain' => 'app1.multitenant.me', 'database' => 'multitenant_app1'],
            ['name' => 'tenant2', 'domain' => 'app2.multitenant.me', 'database' => 'multitenant_app2'],
        ];

        Tenant::upsert($tenants);
    }
}
