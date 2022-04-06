<?php

namespace IshanDeepsource\UnitTestingLogs;

use Monolog\Logger;

class User
{
    public function add(Logger $stderrLogger, Logger $stdoutLogger): void
    {
        $stderrLogger->info('This is information.', ['data' => ['name' => 'foo bar']]);
        $stderrLogger->debug('This is debug message.');
        $stderrLogger->warning('This is warning');
        $stderrLogger->error('This is errorrrr....');

        $stdoutLogger->info('This is information.', ['data' => ['name' => 'stdin']]);
        $stdoutLogger->debug('This is debug message.');
        $stdoutLogger->warning('This is warning');
        $stdoutLogger->error('This is errorrrr....');
    }
}
