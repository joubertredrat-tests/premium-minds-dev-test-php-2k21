<?php

declare(strict_types=1);

namespace App\Game;

use App\Game\Exception\PokemonGame\GameAlreadyFinishedException;
use App\Game\Exception\PokemonGame\GameNotStartedException;
use App\Game\Exception\PokemonGame\InvalidStepsException;
use function str_split;

class PokemonGame implements PokemonGameInterface
{
    const STEP_NORTH = 'N';
    const STEP_SOUTH = 'S';
    const STEP_EAST = 'E';
    const STEP_WEST = 'O';

    private PokemonStorageInterface $pokemonStorage;
    private PositionInterface $position;
    private array $steps;
    private bool $finished;

    public function __construct(
        PokemonStorageInterface $pokemonStorage,
        PositionInterface $position,
        string $steps
    ) {
        if (!self::isValidSteps($steps)) {
            throw InvalidStepsException::throwNew($steps, self::getStepsAvailable());
        }

        $this->pokemonStorage = $pokemonStorage;
        $this->position = $position;
        $this->steps = str_split($steps);
        $this->finished = false;
    }

    public function start(): void
    {
        if ($this->finished) {
            throw GameAlreadyFinishedException::throwNew();
        }

        $this
            ->pokemonStorage
            ->addOne()
        ;

        $position = $this->position;
        $position->registerPosition();

        foreach ($this->steps as $step) {
            if (self::STEP_NORTH === $step) {
                $position->moveToNorth();
            }

            if (self::STEP_SOUTH === $step) {
                $position->moveToSouth();
            }

            if (self::STEP_EAST === $step) {
                $position->moveToEast();
            }

            if (self::STEP_WEST === $step) {
                $position->moveToWest();
            }

            if (!$position->isAlreadyVisited()) {
                $this
                    ->pokemonStorage
                    ->addOne()
                ;
                $position->registerPosition();
            }
        }

        $this->finished = true;
    }

    public function getPokemonCount(): int
    {
        if (!$this->finished) {
            throw GameNotStartedException::throwNew();
        }

        return $this
            ->pokemonStorage
            ->count()
        ;
    }

    public static function getStepsAvailable(): array
    {
        return [
            self::STEP_NORTH,
            self::STEP_SOUTH,
            self::STEP_EAST,
            self::STEP_WEST,
        ];
    }

    private static function isValidSteps(string $steps): bool
    {
        return filter_var($steps, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => self::getRegex()]]) === false;
    }

    private static function getRegex(): string
    {
        return sprintf(
            "/[^%s%s%s%s]{1,}/",
            self::STEP_NORTH,
            self::STEP_SOUTH,
            self::STEP_EAST,
            self::STEP_WEST,
        );
    }
}
