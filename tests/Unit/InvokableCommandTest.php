<?php

namespace Tests\Unit;

use Narration\Console\InvokableCommand;
use Narration\Console\Kernel;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

final class InvokableCommandTest extends TestCase
{
    public function testExecutable(): void
    {
        $input = new ArrayInput([]);

        $output = new BufferedOutput();

        $injectedInput = null;
        $injectedOutput = null;

        $command = new InvokableCommand('foo', function ($input, $output) use (&$injectedInput, &$injectedOutput) {
            $injectedInput = $input;
            $injectedOutput = $output;
        });
        $command->run($input, $output);

        $this->assertSame($input, $injectedInput);
        $this->assertSame($output, $injectedOutput);
    }
}

