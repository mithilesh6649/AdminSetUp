<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loss';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is loss and damage application related command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('|================================|');
        $this->line('|                                |');
        $this->line('|EMAIL: superadmin@lossdamage.com|');
        $this->line('|PASSWORD: Sup3r@dm!n            |');
        $this->line('|                                |');
        $this->line('|================================|');
    }
}
