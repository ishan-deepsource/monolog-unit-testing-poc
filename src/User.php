<?php

namespace IshanDeepsource\UnitTestingLogs;

use Monolog\Logger;

class User
{
    public function add(Logger $logger): void
    {
        $logger->info('This is information.', ['data' => ['name' => 'foo bar']]);

        $logger->debug('This is debug message.');

        $logger->warning('This is warning');

        $logger->error('This is errorrrr....');
    }
}
