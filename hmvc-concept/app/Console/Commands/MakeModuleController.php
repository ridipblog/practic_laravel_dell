<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeModuleController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module-controller {name} {module}';
    // protected $signature = "make:module-controller";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'to make controller in your own module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $module = $this->argument('module');
        $path = base_path("app/Modules/$module/Controllers/$name.php");
        $names = explode("/", $name);
        if (!File::isDirectory(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }
        if (!file_exists($path)) {
            $namespaces = "";
            if (count($names) != 0) {
                for ($i = 0; $i < count($names) - 1; $i++) {
                    $namespaces .= '\\' . $names[$i];
                }
            }
            $class_name = end($names);
            File::put($path, "<?php namespace App\Modules\\$module\Controllers$namespaces;
            use App\Http\Controllers\Controller;
            class $class_name extends Controller { public function index() {  } }");
            $this->info("Controller created at $path");
        } else {
            echo "Controller is already exists !";
        }
    }
}
