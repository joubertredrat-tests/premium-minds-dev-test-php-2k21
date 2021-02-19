<?php

declare(strict_types=1);

namespace App\Tests\Unit\Game;

use App\Game\Position;
use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{
    public function testStartPosition(): void
    {
        $position = new Position();

        self::assertFalse($position->isAlreadyVisited());

        $position->registerPosition();

        self::assertTrue($position->isAlreadyVisited());
    }

    public function testMovingToNorth(): void
    {
        $position = new Position();
        $position->moveToNorth();

        self::assertFalse($position->isAlreadyVisited());

        $position->registerPosition();

        self::assertTrue($position->isAlreadyVisited());

        $position->moveToSouth();

        self::assertFalse($position->isAlreadyVisited());
    }

    public function testMovingToSouth(): void
    {
        $position = new Position();
        $position->moveToSouth();

        self::assertFalse($position->isAlreadyVisited());

        $position->registerPosition();

        self::assertTrue($position->isAlreadyVisited());

        $position->moveToNorth();

        self::assertFalse($position->isAlreadyVisited());
    }

    public function testMovingToEast(): void
    {
        $position = new Position();
        $position->moveToEast();

        self::assertFalse($position->isAlreadyVisited());

        $position->registerPosition();

        self::assertTrue($position->isAlreadyVisited());

        $position->moveToWest();

        self::assertFalse($position->isAlreadyVisited());
    }

    public function testMovingToWest(): void
    {
        $position = new Position();
        $position->moveToWest();

        self::assertFalse($position->isAlreadyVisited());

        $position->registerPosition();

        self::assertTrue($position->isAlreadyVisited());

        $position->moveToEast();

        self::assertFalse($position->isAlreadyVisited());
    }
}
