<?php

namespace Organi\Helpers;

use Spatie\LaravelPackageTools\Package;
use Organi\Helpers\Console\Commands\TestMail;
use Organi\Helpers\Console\Commands\TestBugsnag;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Organi\Helpers\Console\Commands\GenerateJavascriptConstants;

class HelpersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('helpers')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(TestMail::class)
            ->hasCommand(TestBugsnag::class)
            ->hasCommand(GenerateJavascriptConstants::class);
    }
}
