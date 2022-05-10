<?php

namespace Organi\Helpers;

use Organi\Helpers\Console\Commands\GenerateJavascriptConstants;
use Organi\Helpers\Console\Commands\TestBugsnag;
use Organi\Helpers\Console\Commands\TestMail;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
