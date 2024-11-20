<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Own Service ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name=$this->argument('name');
        $path=base_path("app/Services/$name.php");
        $names=explode("/",$name);
        if(!File::isDirectory(dirname($path))){
            File::makeDirectory(dirname($path),0755,true);
        }
        if(!file_exists($path)){
            $namespaces="";
            if(count($names)!=0){
                for($i=0;$i<count($names)-1;$i++){
                    $namespaces.='\\'.$names[$i];
                }
            }
            $service_name=end($names);
            File::put($path, "<?php namespace App\Services$namespaces;
            class $service_name {}");
            $this->info("Service Created at $path");
        }else{
            echo "Service name already exists !";
        }
    }
}
