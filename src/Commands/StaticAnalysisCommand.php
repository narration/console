<?php

namespace Narration\Testing\Commands;

use PHPStan\Command\AnalyseCommand;
use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class StaticAnalysisCommand extends AnalyseCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        parent::configure();

        $this->setName('test:static-analysis');
    }
}
