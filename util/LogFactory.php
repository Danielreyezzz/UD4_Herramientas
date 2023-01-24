<?php

namespace UD4_Herramientas\util;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

include_once "vendor/autoload.php";

class LogFactory
{
    public static function getLogger(string $canal = "miApp"): LoggerInterface
    {
        $log = new Logger($canal);
        $log->pushHandler(new StreamHandler("log/miApp.log", Logger::DEBUG));

        return $log;
    }
}
