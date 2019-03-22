<?php

namespace Narration\Console;

use function call_user_func;
use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InvokableCommand extends BaseCommand
{
    /**
     * @var \callable
     */
    private $callable;

    /**
     * InvokableCommand constructor.
     *
     * @param string $name
     * @param callable $callable
     * @param array $definition
     */
    public function __construct(string $name, callable $callable, array $definition = [])
    {
        parent::__construct($name);

        $this->setDefinition($definition);

        $this->callable = $callable;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output): void
    {
        call_user_func($this->callable, $input, $output);
    }
}
