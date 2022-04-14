<?php

namespace Organi\Helpers\Console\Commands;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Console\Command;
use RuntimeException;

class TestBugsnag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:bugsnag';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an exception to bugsnag.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Bugsnag::notifyException(new RuntimeException('test'));

        return 0;
    }
}
