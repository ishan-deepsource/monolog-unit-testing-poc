<?php

declare(strict_types=1);

namespace IshanDeepsource\UnitTestingLogs\Tests;

use PHPUnit\Framework\TestCase;
use IshanDeepsource\UnitTestingLogs\User;

final class UserTest extends TestCase
{
    private $stderrStream = null;

    private $stdoutStream = null;

    private $stderrLogger = null;

    private $stdoutLogger = null;

    protected function setUp(): void
    {
        require __DIR__ . '/../config/bootstrap.php';

        $this->stderrStream = new \Monolog\Handler\TestHandler();
        // set formatter
        $formatter = new \Monolog\Formatter\LineFormatter(LOG_MESSAGE_FORMAT, LOG_DATE_FORMAT);
        $this->stderrStream->setFormatter($formatter);
        // set logger instance
        $this->stderrLogger = new \Monolog\Logger('stderr');
        $this->stderrLogger->pushHandler($this->stderrStream);
        $this->stderrLogger->pushProcessor(new \Monolog\Processor\IntrospectionProcessor(\Monolog\Logger::DEBUG));

        $this->stdoutStream = new \Monolog\Handler\TestHandler();
        // set formatter
        $formatter = new \Monolog\Formatter\LineFormatter(LOG_MESSAGE_FORMAT, LOG_DATE_FORMAT);
        $this->stdoutStream->setFormatter($formatter);
        // set logger instance
        $this->stdoutLogger = new \Monolog\Logger('stdout');
        $this->stdoutLogger->pushHandler($this->stdoutStream);
        $this->stdoutLogger->pushProcessor(new \Monolog\Processor\IntrospectionProcessor(\Monolog\Logger::DEBUG));
    }

    public function testAdd(): void
    {
        (new User())->add($this->stderrLogger, $this->stdoutLogger);

        // var_dump(get_class_methods($this->stderrStream));
        print_r($this->stderrStream->getRecords());
        print_r($this->stdoutLogger->getRecords());
        $this->assertTrue($this->stderrStream->hasErrorRecords());
        $this->assertTrue($this->stderrStream->hasErrorThatContains('Error'));
    }
}
