<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshes database and re launch fixtures';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if(app()->isProduction()) {
            return self::FAILURE;
        }
        $storage = Storage::disk('images');

        if ($storage->exists('products')) {
            $storage->deleteDirectory('products');
        }

        if ($storage->exists('brands')) {
            $storage->deleteDirectory('brands');
        }

        $storage->makeDirectory('brands');
        $storage->makeDirectory('products');

        $this->call('migrate:refresh', [
            '--seed' => true
        ]);
        return self::SUCCESS;
    }
}
