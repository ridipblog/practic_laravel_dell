<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeModuleMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module-migration {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make module migration file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $module = $this->argument('module');
        $migrationPath = base_path("app/Modules/$module/databases/migrations");
        $timestamp = date('Y_m_d_His');
        $migrationFileName = "{$migrationPath}/{$timestamp}_{$name}.php";
        $migration_content = $this->getMigrationContent($name);
        file_put_contents($migrationFileName, $migration_content);
        $this->info("Controller created at $migrationFileName");
    }
    protected function getMigrationContent($name)
    {
        return <<<EOD
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_name', function (Blueprint \$table) {
            \$table->id();
            \$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_name');
    }
};

EOD;
    }
}
