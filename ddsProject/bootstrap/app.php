<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Str;
use App\Domains\Candidate\Providers\CandidateServiceProvider;

$basePath = dirname(__DIR__);
$cacheFile = $basePath . '/bootstrap/cache/domain_providers.php';
$providers = [];
if (file_exists($cacheFile)) {
    $providers = require $cacheFile;
} else {
    $providers = collect(
        glob($basePath . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Domains' . DIRECTORY_SEPARATOR . '*' . DIRECTORY_SEPARATOR . 'Providers' . DIRECTORY_SEPARATOR . '*ServiceProvider.php')
    )->map(function ($file) use ($basePath) {

        return Str::of($file)
            ->replace($basePath . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR, '')
            ->replace(['/', '\\'], '\\')
            ->replace('.php', '')
            ->prepend('App\\')
            ->toString();
    })->toArray();

    file_put_contents(
        $cacheFile,
        '<?php return ' . var_export($providers, true) . ';'
    );
}

// $providers = collect(
//     glob($basePath . '/app/Domains/*/Providers/*ServiceProvider.php')
// )->map(function ($file) use ($basePath) {

//     $relativePath = str_replace(
//         $basePath . '/app/',
//         '',
//         $file
//     );

//     return 'App\\' . str_replace(
//         ['/', '.php'],
//         ['\\', ''],
//         $relativePath
//     );
// })->toArray();

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withProviders([
        // CandidateServiceProvider::class
        ...$providers
    ])
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withCommands([
        App\Console\Commands\MakeDomain::class,
        App\Console\Commands\MakeDomainController::class,
        App\Console\Commands\MakeDomainView::class,
    ])
    ->create();
