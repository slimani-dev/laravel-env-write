<?php

namespace MohSlimani\LaravelEnvWrite;

use MohSlimani\LaravelEnvWrite\Commands\LaravelEnvWriteCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelEnvWriteServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-env-write')
            ->hasCommand(LaravelEnvWriteCommand::class);
    }
}
