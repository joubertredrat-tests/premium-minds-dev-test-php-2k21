<?php

declare(strict_types=1);

namespace App\Tests\Unit\Game\Exception\PokemonGame;

use App\Game\Exception\PokemonGame\GameAlreadyFinishedException;
use PHPUnit\Framework\TestCase;

class GameAlreadyFinishedExceptionTest extends TestCase
{
    public function testThrowNew(): void
    {
        self::expectException(GameAlreadyFinishedException::class);
        self::expectExceptionMessage("Game already finished");

        throw GameAlreadyFinishedException::throwNew();
    }
}
