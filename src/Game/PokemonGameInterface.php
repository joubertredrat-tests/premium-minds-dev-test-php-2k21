<?php

declare(strict_types=1);

namespace App\Game;

interface PokemonGameInterface
{
    public function start(): void;

    public function getPokemonCount(): int;
}
