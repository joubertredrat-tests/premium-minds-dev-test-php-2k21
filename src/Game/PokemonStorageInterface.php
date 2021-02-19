<?php

declare(strict_types=1);

namespace App\Game;

use Countable;

interface PokemonStorageInterface extends Countable
{
    public function addOne(): void;
}
