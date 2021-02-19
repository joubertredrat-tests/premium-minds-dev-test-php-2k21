<?php

declare(strict_types=1);

namespace App\Tests\Unit\Game\Exception\PokemonGame;

use App\Game\Exception\PokemonGame\GameNotStartedException;
use PHPUnit\Framework\TestCase;

class GameNotStartedExceptionTest extends TestCase
{
    public function testThrowNew(): void
    {
        self::expectException(GameNotStartedException::class);
        self::expectExceptionMessage("Game not started");

        throw GameNotStartedException::throwNew();
    }
}
