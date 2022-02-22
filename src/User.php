<?php

namespace IshanDeepsource\UnitTestingLogs;

use Monolog\Logger;

class User
{
    public function add(Logger $logger): void
    {
        $logger->info('Info');

        $logger->debug('Debug');

        $logger->warning('Warning');

        $logger->error('Error');
    }
}
