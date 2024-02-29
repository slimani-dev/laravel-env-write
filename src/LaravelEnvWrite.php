<?php

namespace MohSlimani\LaravelEnvWrite;

use InvalidArgumentException;

class LaravelEnvWrite
{

    /**
     * Write a new environment file with the given key.
     *
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function updateEnvironmentFileWith(string $key, string $value): bool
    {
        $env = file_get_contents(app()->environmentFilePath());

        // the regex pattern that will match env key and the old value.
        $pattern = "/^{$key}=(.*)/m";

        $newEnv = preg_replace($pattern, "{$key}={$value}", $env);

        if ($newEnv === $env || $newEnv === null) {
            // add the new key to the end of the file
            $newEnv .= "\n{$key}={$value}";
        }

        file_put_contents(app()->environmentFilePath(), $newEnv);

        return true;
    }

    /**
     * Parse key, value and path to .env-file from command line arguments.
     *
     * @param string $_key
     * @param string|null $_value
     * @return string[] [string KEY, string value, ?string envFilePath].
     */
    public function parseKeyAndValue(string $_key, ?string $_value): array
    {
        $key = null;
        $value = null;

        // Parse "key=value" key argument.
        if (preg_match('#^([^=]+)=(.*)$#umU', $_key, $matches)) {
            [1 => $key, 2 => $value] = $matches;

            // Use second argument as path to env file:
            if ($_value !== null) {
                $envFilePath = $_value;
            }
        } else {
            $key = $_key;
            $value = $_value;
        }

        $this->assertKeyIsValid($key);

        // If the value contains spaces but not is not enclosed in quotes.
        if (preg_match('#^[^\'"].*\s+.*[^\'"]$#umU', $value)) {
            $value = '"' . $value . '"';
        }

        return [strtoupper($key), $value];
    }

    /**
     * Assert a given string is valid as an environment variable key.
     *
     * @param string $key
     *
     * @return bool Is key is valid.
     */
    public function assertKeyIsValid(string $key): bool
    {
        if (str($key)->contains('=')) {
            throw new InvalidArgumentException('Invalid environment key ' . $key
                . "! Environment key should not contain '='");
        }

        if (!preg_match('/^[a-zA-Z_]+$/', $key)) {
            throw new InvalidArgumentException('Invalid environment key ' . $key
                . '! Only use letters and underscores');
        }

        return true;
    }
}
