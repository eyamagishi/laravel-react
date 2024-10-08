<?php

namespace App\Services\PokemonService;

use App\Repositories\PokemonRepository\PokemonRepositoryInterface as PokemonRepository;

class PokemonService implements PokemonServiceInterface
{
    /**
     * @var PokemonRepository
     */
    protected PokemonRepository $pokemonRepository;

    /**
     * コンストラクタ
     *
     * @param PokemonRepository $pokemonRepository
     */
    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }
}
