<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IndexCommand extends Command
{
    protected static $defaultName = 'pokemon:index';

    protected function configure()
    {
        $this->setDescription('Informações do "Pokemon: apanhá-los todos"');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Pokemon: apanhá-los todos');
        $output->writeln('');
        $output->writeln('Como jogar:');
        $output->writeln('  bin/console pokemon:capturar --casas [casas]');
        $output->writeln('');
        $output->writeln('Nas casas informar "N" para norte, "S" para sul, "E" para este e/ou "O" para oeste');
        $output->writeln('');
        $output->writeln('Exemplos:');
        $output->writeln('  bin/console pokemon:capturar --casas N');
        $output->writeln('  bin/console pokemon:capturar --casas NESO');
        $output->writeln('  bin/console pokemon:capturar --casas NSNSNSNSNS');
        $output->writeln('');

        return 0;
    }
}
