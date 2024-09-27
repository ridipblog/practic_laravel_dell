<?php

namespace App\Console\Commands;

use App\Models\CronTest\CronTempModel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-request';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete 10 older request data ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = Carbon::now()->subDays(10);
        $deleteRecords=CronTempModel::where('created_at', '<=', $date)->delete();
        $this->info($deleteRecords);

    }
}
