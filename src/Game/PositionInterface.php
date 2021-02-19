<?php

declare(strict_types=1);

namespace App\Game;

interface PositionInterface
{
    public function moveToNorth(): void;

    public function moveToSouth(): void;

    public function moveToEast(): void;

    public function moveToWest(): void;

    public function registerPosition(): void;

    public function isAlreadyVisited(): bool;
}
