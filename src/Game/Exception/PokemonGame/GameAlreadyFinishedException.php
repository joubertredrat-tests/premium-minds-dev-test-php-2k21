<?php

declare(strict_types=1);

namespace App\Game\Exception\PokemonGame;

use RuntimeException;

class GameAlreadyFinishedException extends RuntimeException
{
    public static function throwNew(): self
    {
        return new self("Game already finished");
    }
}
