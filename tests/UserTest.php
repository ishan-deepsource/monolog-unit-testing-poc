<?php

declare(strict_types=1);

namespace IshanDeepsource\UnitTestingLogs\Tests;

use PHPUnit\Framework\TestCase;
use IshanDeepsource\UnitTestingLogs\User;

final class UserTest extends TestCase
{
    private $stream = null;

    private $logger = null;

    protected function setUp(): void
    {
        $this->stream = new \Monolog\Handler\TestHandler();
        // set formatter
        $dateFormat = "Y-m-d H:i:sP";
        $output = "[%datetime%] %level_name%: %message% %context% %extra%\n";
        $formatter = new \Monolog\Formatter\LineFormatter($output, $dateFormat);
        $this->stream->setFormatter($formatter);
        // set logger instance
        $this->logger = new \Monolog\Logger('logger');
        $this->logger->pushHandler($this->stream);
    }

    public function testAdd(): void
    {
        (new User())->add($this->logger);

        $this->assertTrue($this->stream->hasErrorRecords());
        $this->assertTrue($this->stream->hasErrorThatContains('Error'));
    }
}
