<?php

namespace Psr\Log;

class FileLogger implements LoggerInterface
{
    public function emergency($message, array $context = []): void
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert($message, array $context = []): void
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical($message, array $context = []): void
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function error($message, array $context = []): void
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning($message, array $context = []): void
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function notice($message, array $context = []): void
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function info($message, array $context = []): void
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug($message, array $context = []): void
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function log($level, $message, array $context = []): void
    {
        $template = "{date} {level} {message} {context}";
        if (!file_exists('log.txt')) {
            file_put_contents('log.txt', '');
        }
        file_put_contents('log.txt', trim(strtr($template, [
                '{date}' => date('Y-m-d H:i:s'),
                '{level}' => ' Рівень помилки: ' . $level,
                '{message}' => ' Повідомлення: ' . $message,
                '{context}' => (!empty($context) ? json_encode($context) : null),
            ])) . PHP_EOL, FILE_APPEND);
    }
}
