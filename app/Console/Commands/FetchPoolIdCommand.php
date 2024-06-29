<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FetchPoolIdCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-pool-id-command';

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
        $user = Auth::user();
        
        if ($user) {
            $pool_id = $user->joinPools()->first()->pool_id ?? null;

            if ($pool_id) {
                // Store the pool ID in a config file, session, cache, or environment variable
                config(['app.pool_id' => $pool_id]);
                $this->info('Pool ID fetched successfully: ' . $pool_id);
            } else {
                $this->error('User has not joined any pool.');
            }
        } else {
            $this->error('User is not authenticated.');
        }
    }
}
