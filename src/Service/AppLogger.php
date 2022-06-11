<?php

namespace App\Service;
use think\facade\Log;

class AppLogger extends IAppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINKLOG = 'thinklog';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
             $this->logger = new AppLogerLog4PHP();
        
        } else if ($type == self::TYPE_THINKLOG) {
             $this->logger = new AppLogerThinkLog();
        }
    }


    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }    

}


abstract class IAppLogger
{  
    abstract function info($message);

    abstract function debug($message);

    abstract function error($message);
}  


class AppLogerLog4PHP extends IAppLogger
{


    private $logger;

    public function __construct()
    {
        $this->logger = \Logger::getLogger("Log");
    }

    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }

}

class AppLogerThinkLog extends IAppLogger
{


    private $logger;

    public function __construct()
    {
        Log::init([
            'default'   =>  'file',
            'channels'  =>  [
                'file'  =>  [
                    'type'  =>  'file',
                    'path'  =>  './logs/',
                ],
            ],
        ]);
    }

    public function info($message = '')
    {
        $this->convertMsg($message);
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->convertMsg($message);
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->convertMsg($message);
        $this->logger->error($message);
    }

    private function convertMsg($message)
    {
        strtoupper($message);
    }    

}

