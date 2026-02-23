<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeDomainView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:domain-view {domain} {view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $domain = ucfirst($this->argument('domain'));
        $viewInput = $this->argument('view');

        $viewInput = str_replace('\\', '/', $viewInput);

        $viewName = basename($viewInput);

        $subPath = dirname($viewInput) !== '.'
            ? dirname($viewInput)
            : '';

        $basePath = app_path("Domains/{$domain}/Views");

        $directoryPath = $subPath
            ? $basePath . '/' . $subPath
            : $basePath;

        $filePath = $directoryPath . '/' . $viewName . '.blade.php';

        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        // Check if file already exists
        if (File::exists($filePath)) {
            $this->error("view already exists!");
            return;
        }

        // view template content
        $content = "";

        // Create file with content
        File::put($filePath, $content);

        $this->info("view {$viewName} created successfully in Domain {$domain}.");
    }
}
