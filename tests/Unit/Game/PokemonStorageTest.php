<?php

declare(strict_types=1);

namespace App\Tests\Unit\Game;

use App\Game\PokemonStorage;
use PHPUnit\Framework\TestCase;
use function mt_rand;

class PokemonStorageTest extends TestCase
{
    public function testCountPokemons(): void
    {
        $pokemonStorage = new PokemonStorage();

        self::assertCount(0, $pokemonStorage);

        $countPokemonsExpected = mt_rand(10, 9999);

        for ($i = 1; $i <= $countPokemonsExpected; $i++) {
            $pokemonStorage->addOne();
        }

        self::assertCount($countPokemonsExpected, $pokemonStorage);
    }
}
