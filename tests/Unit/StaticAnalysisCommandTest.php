<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;
use Narration\Testing\Commands\StaticAnalysisCommand;

final class StaticAnalysisCommandTest extends TestCase
{
    public function testName(): void
    {
        $command = new StaticAnalysisCommand();

        static::assertEquals($command->getName(), 'test:static-analysis');
    }
}

