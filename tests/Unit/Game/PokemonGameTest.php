<?php

declare(strict_types=1);

namespace App\Tests\Unit\Game;

use App\Game\Exception\PokemonGame\GameAlreadyFinishedException;
use App\Game\Exception\PokemonGame\GameNotStartedException;
use App\Game\Exception\PokemonGame\InvalidStepsException;
use App\Game\PokemonGame;
use App\Game\PokemonStorage;
use App\Game\Position;
use PHPUnit\Framework\TestCase;

class PokemonGameTest extends TestCase
{
    public function testGameRunningInput1(): void
    {
        $pokemonCountExpected = 2;
        $pokemonGameOne = new PokemonGame(new PokemonStorage(), new Position(), "N");
        $pokemonGameOne->start();

        self::assertEquals($pokemonCountExpected, $pokemonGameOne->getPokemonCount());
    }

    public function testGameRunningInput2(): void
    {
        $pokemonCountExpected = 4;
        $pokemonGameOne = new PokemonGame(new PokemonStorage(), new Position(), "NESO");
        $pokemonGameOne->start();

        self::assertEquals($pokemonCountExpected, $pokemonGameOne->getPokemonCount());
    }

    public function testGameRunningInput3(): void
    {
        $pokemonCountExpected = 2;
        $pokemonGameOne = new PokemonGame(new PokemonStorage(), new Position(), "NSNSNSNSNS");
        $pokemonGameOne->start();

        self::assertEquals($pokemonCountExpected, $pokemonGameOne->getPokemonCount());
    }

    public function testGameRunningRandomSteps(): void
    {
        $pokemonCountExpected = 4;
        $pokemonGameOne = new PokemonGame(new PokemonStorage(), new Position(), "NSONS");
        $pokemonGameOne->start();

        self::assertEquals($pokemonCountExpected, $pokemonGameOne->getPokemonCount());
    }

    public function testConstructThrowInvalidStepsException(): void
    {
        self::expectException(InvalidStepsException::class);

        new PokemonGame(new PokemonStorage(), new Position(), "NSAONXS");
    }

    public function testStartThrowGameAlreadyFinishedException(): void
    {
        self::expectException(GameAlreadyFinishedException::class);

        $pokemonGameOne = new PokemonGame(new PokemonStorage(), new Position(), "N");
        $pokemonGameOne->start();
        $pokemonGameOne->start();
    }

    public function testGetPokemonCountThrowGameNotStartedException(): void
    {
        self::expectException(GameNotStartedException::class);

        $pokemonGameOne = new PokemonGame(new PokemonStorage(), new Position(), "N");
        $pokemonGameOne->getPokemonCount();
    }
}
