<?php

namespace PS\PlaneBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Console\Input\StringInput;

abstract class AbstractTest extends WebTestCase
{
    protected $application;

    public function setUp()
    {
        $this->runSymfonyCommand('doctrine:schema:drop --force');
        $this->runSymfonyCommand('doctrine:schema:create');
    }

    protected function runSymfonyCommand($command)
    {
        $command = sprintf('%s --env=test --quiet', $command);

        return $this->getApplication()->run(new StringInput($command));
    }

    protected function getApplication()
    {
        if (null === $this->application) {
            $client = static::createClient();

            $this->application = new Application($client->getKernel());
            $this->application->setAutoExit(false);
        }

        return $this->application;
    }

    protected function log($content, $exercise)
    {
        file_put_contents(__DIR__ . '/../../../../output/exercise_' . $exercise . '.html', $content);
    }
}
