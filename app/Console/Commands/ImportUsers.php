<?php

namespace App\Console\Commands;

use App\Services\Users\Importer;
use Illuminate\Console\Command;
use Log;

class ImportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:import {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The command allows to import users';

    /**
     * @var Importer
     */
    protected $importer;

    /**
     * Create a new command instance.
     *
     * @param Importer $importer
     */
    public function __construct(Importer $importer)
    {
        parent::__construct();
        $this->importer = $importer;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->importer->import($this->argument('file'));
        } catch (\Exception $e) {
            $this->error('Something went wrong');
            Log::error($e->getMessage());
        }

        $this->info('Done!!!');
    }
}
