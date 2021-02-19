<?php

declare(strict_types=1);

namespace App\Game\Exception\PokemonGame;

use InvalidArgumentException;
use function implode;
use function sprintf;

class InvalidStepsException extends InvalidArgumentException
{
    public static function throwNew(string $stepsGot, array $stepsExpected): self
    {
        return new self(
            sprintf(
                "Invalid steps, got [ %s ] expected only one or more of [ %s ]",
                $stepsGot,
                implode("", $stepsExpected)
            )
        );
    }
}
