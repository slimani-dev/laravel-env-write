<?php

namespace MohSlimani\LaravelEnvWrite\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MohSlimani\LaravelEnvWrite\LaravelEnvWrite
 * @method static array parseKeyAndValue(string $_key, ?string $_value)
 * @method static bool assertKeyIsValid(string $key)
 * @method static bool updateEnvironmentFileWith(string $key, string $value)
 */
class LaravelEnvWrite extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \MohSlimani\LaravelEnvWrite\LaravelEnvWrite::class;
    }
}
