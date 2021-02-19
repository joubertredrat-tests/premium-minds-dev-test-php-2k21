<?php

declare(strict_types=1);

namespace App\Game;

class PokemonStorage implements PokemonStorageInterface
{
    private int $count;

    public function __construct()
    {
        $this->count = 0;
    }

    public function addOne(): void
    {
        $this->count++;
    }

    public function count(): int
    {
        return $this->count;
    }
}
