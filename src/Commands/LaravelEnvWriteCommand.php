<?php

namespace MohSlimani\LaravelEnvWrite\Commands;

use Illuminate\Console\Command;
use MohSlimani\LaravelEnvWrite\Facades\LaravelEnvWrite;

class LaravelEnvWriteCommand extends Command
{
    public const ARGUMENT_KEY = 'key';
    public const ARGUMENT_VALUE = 'value';
    public $signature = 'env:write'
    . ' {' . self::ARGUMENT_KEY . ' : Key or "key=value" pair}'
    . ' {' . self::ARGUMENT_VALUE . '? : Value}';

    public $description = 'update the .env file';

    public function handle(): int
    {
        // Parse key and value arguments.
        [$key, $value] = LaravelEnvWrite::parseKeyAndValue(
            $this->argument(self::ARGUMENT_KEY),
            $this->argument(self::ARGUMENT_VALUE),
        );

        LaravelEnvWrite::updateEnvironmentFileWith($key, $value);

        $this->comment('All done');

        return self::SUCCESS;
    }
}
