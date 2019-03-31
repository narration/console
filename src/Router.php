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
     * Holds the default command.
     *
     * @var string
     */
    private $default = 'list';

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
     * @param array $definition
     */
    public function command(string $name, string $invokable, array $definition = []): void
    {
        $instance = $this->container->get($invokable);

        $this->commands[] = new InvokableCommand($name, $instance, $definition);
    }

    /**
     * Sets the default command.
     *
     * @param string  $name
     */
    public function setDefault(string $name): void
    {
        $this->default = $name;
    }

    /**
     * Gets the default command.
     *
     * @return  string
     */
    public function getDefault(): string
    {
        return $this->default;
    }

    /**
     * @return array
     */
    public function getCommands(): array
    {
        return $this->commands;
    }
}
