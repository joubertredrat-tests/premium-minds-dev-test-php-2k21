<?php

declare(strict_types=1);

namespace App\Command;

use App\Game\Exception\PokemonGame\InvalidStepsException;
use App\Game\PokemonGame;
use App\Game\PokemonStorage;
use App\Game\Position;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use function sprintf;

class GameCommand extends Command
{
    protected static $defaultName = 'pokemon:capturar';

    protected function configure()
    {
        $this
            ->setDescription('Captura dos pokemons do "Pokemon: apanhá-los todos"')
            ->setDefinition(
                new InputDefinition([
                    new InputOption('casas', null, InputOption::VALUE_REQUIRED),
                ])
            );
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $symfonyStyle = new SymfonyStyle($input, $output);

        try {
            $steps = $input->getOption('casas');
            $pokemonGame = new PokemonGame(new PokemonStorage(), new Position(), $steps);
            $pokemonGame->start();
            $count = $pokemonGame->getPokemonCount();
            $plural = $count > 1 ? 's' : '';

            $symfonyStyle->success(sprintf("Legal! Você apanhou %d pokemon%s", $count, $plural));

            return 0;
        } catch (InvalidStepsException $e) {
            $symfonyStyle->warning("Você deve ter informado alguma casa errada, tente novamente!");
            return 255;
        } catch (\Throwable $e) {
            $symfonyStyle->error("Alguma coisa deu errado! Tente novamente");
            return 255;
        }
    }
}
