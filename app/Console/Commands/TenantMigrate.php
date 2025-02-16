<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TenantMigrate extends Command
{
    protected $signature = 'tenant:migrate {schema}';
    protected $description = 'Run migrations for a specific tenant schema';

    public function handle()
    {
        $schema = $this->argument('schema');

        Config::set('database.connections.tenant.search_path', $schema);
        DB::connection('tenant')->reconnect();

        $this->call('migrate', [
            '--database' => 'tenant',
            '--path' => 'database/migrations/tenant',
        ]);
    }
}