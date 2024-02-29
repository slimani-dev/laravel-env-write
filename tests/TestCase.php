<?php

namespace MohSlimani\LaravelEnvWrite\Tests;

use MohSlimani\LaravelEnvWrite\LaravelEnvWriteServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelEnvWriteServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
