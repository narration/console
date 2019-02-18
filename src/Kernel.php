<?php

declare(strict_types=1);

namespace Narration\Console;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;

final class Kernel
{
    /**
     * @var \Symfony\Component\Console\Application
     */
    private $application;

    /**
     * Kernel constructor.
     *
     * @param  \Symfony\Component\Console\Application $application
     */
    private function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * @param  mixed $commands
     *
     * @return \Narration\Console\Kernel
     */
    public static function using(Router $router): self
    {
        $application = new Application('Narrative', '@dev');

        foreach ($application->all() as $command) {
            $command->setHidden(true);
        }

        foreach ($commands as $name => $callable) {
            $application->add(new InvokableCommand($name, $callable));
        }

        return new self($application);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $inputInterface
     *
     * @throws \Exception
     */
    public function dispatch(InputInterface $inputInterface): void
    {
        $this->application->run($inputInterface);
    }
}
