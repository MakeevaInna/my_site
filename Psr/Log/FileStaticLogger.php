<?php

namespace Psr\Log;

class FileStaticLogger
{
    private static FileLogger $logger;

    public static function init()
    {
        self::$logger = new FileLogger();
    }

    public static function error($message, $context)
    {
        static::$logger->error($message, $context);
    }

    public static function info($message, array $context = []): void
    {
        static::$logger->info($message, $context);
    }
}
