<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeDomain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'make:domain {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new DDD Domain structure';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $domain = $this->argument('name');
        $basePath = app_path("Domains/{$domain}");

        $folders = [
            'Http/Controllers',
            'Http/Requests',
            'Services',
            'Repositories',
            'Providers',
            'Routes',
            'Views',
        ];

        foreach ($folders as $folder) {
            File::makeDirectory("{$basePath}/{$folder}", 0755, true, true);
        }

        $this->info("Domain {$domain} created successfully.");
    }
}
