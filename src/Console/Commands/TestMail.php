<?php

namespace Organi\Helpers\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Organi\Helpers\Mail\TestMail as MailTestMail;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mail {to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test mail.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $to = $this->argument('to');

        Mail::to($to)
            ->queue(new MailTestMail());

        return 0;
    }
}
