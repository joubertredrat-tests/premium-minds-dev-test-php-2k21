<?php

declare(strict_types=1);

namespace App\Tests\Unit\Game\Exception\PokemonGame;

use App\Game\Exception\PokemonGame\InvalidStepsException;
use App\Game\PokemonGame;
use PHPUnit\Framework\TestCase;
use function implode;
use function sprintf;

class InvalidStepsExceptionTest extends TestCase
{
    public function testThrowNew(): void
    {
        $stepsGot = "FOO";
        $messageExpected = sprintf(
            "Invalid steps, got [ %s ] expected only one or more of [ %s ]",
            $stepsGot,
            implode("", PokemonGame::getStepsAvailable())
        );


        self::expectException(InvalidStepsException::class);
        self::expectExceptionMessage($messageExpected);

        throw InvalidStepsException::throwNew($stepsGot, PokemonGame::getStepsAvailable());
    }
}
