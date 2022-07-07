<?php

namespace Psr\Log;

class FileStaticLogger
{
    private static FileLogger $logger;

    public static function init()
    {
        self::$logger = new FileLogger();
    }

    public static function emergency($message, $context)
    {
        static::$logger->emergency($message, $context);
    }

    public static function alert($message, $context)
    {
        static::$logger->alert($message, $context);
    }

    public static function critical($message, $context)
    {
        static::$logger->critical($message, $context);
    }

    public static function error($message, $context)
    {
        static::$logger->error($message, $context);
    }

    public static function warning($message, $context)
    {
        static::$logger->warning($message, $context);
    }

    public static function notice($message, $context)
    {
        static::$logger->notice($message, $context);
    }

    public static function info($message, array $context = []): void
    {
        static::$logger->info($message, $context);
    }

    public static function debug($message, $context)
    {
        static::$logger->debug($message, $context);
    }
}
