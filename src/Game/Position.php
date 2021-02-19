<?php

declare(strict_types=1);

namespace App\Game;

use function sprintf;

class Position implements PositionInterface
{
    private int $coordinateNorthSouth;
    private int $coordinateEastWest;
    private array $positions;

    public function __construct()
    {
        $this->positions = [];
        $this->coordinateNorthSouth = 0;
        $this->coordinateEastWest = 0;
    }

    public function moveToNorth(): void
    {
        $this->coordinateNorthSouth++;
    }

    public function moveToSouth(): void
    {
        $this->coordinateNorthSouth--;
    }

    public function moveToEast(): void
    {
        $this->coordinateEastWest--;
    }

    public function moveToWest(): void
    {
        $this->coordinateEastWest++;
    }

    public function registerPosition(): void
    {
        $this->positions[$this->getCoordinatesKey()] = true;
    }

    public function isAlreadyVisited(): bool
    {
        return isset($this->positions[$this->getCoordinatesKey()]) && $this->positions[$this->getCoordinatesKey()];
    }

    private function getCoordinatesKey(): string
    {
        return sprintf('%d,%d', $this->coordinateNorthSouth, $this->coordinateEastWest);
    }
}
