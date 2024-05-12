<?php

namespace App\Http\Service;

use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TenantService
{

    private $tenant;
    private $domain;
    private $database;

    public function switchToTenant(Tenant $tenant)
    {
        DB::purge('system');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database', $tenant->database);

        $this->tenant = $tenant;
        $this->domain = $tenant->domain;
        $this->database = $tenant->database;

        DB::connection('tenant')->reconnect();
        DB::setDefaultConnection('tenant');
    }
    public function switchToDefault(Tenant $tenant)
    {
        DB::purge('system');
        DB::purge('tenant');
        DB::connection('system')->reconnect();
        DB::setDefaultConnection('system');
    }

    public function getTenant()
    {
        return $this->tenant;
    }
}
