<?php

declare(strict_types=1);

namespace Narration\Console;

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;

final class Router
{
    /**
     * @var \Psr\Container\ContainerInterface
     */
    private $container;

    /**
     * @var array
     */
    private $commands;

    /**
     * Router constructor.
     *
     * @param \Psr\Container\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $name
     * @param string $invokable
     */
    public function command(string $name, string $invokable): void
    {
        $instance = $this->container->get($invokable);

        $this->commands[] = new InvokableCommand($name, $instance);
    }

    /**
     * @return array
     */
    public function getCommands(): array
    {
        return $this->commands;
    }
}
