<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

use Illuminate\Http\Request;
use App\Services\PokemonService\PokemonServiceInterface as PokemonService;

class PokemonController extends Controller
{
    /**
     * @var PokemonService
     */
    protected PokemonService $pokemonService;

    /**
     * コンストラクタ
     *
     * @param PokemonService $pokemonService
     */
    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    /**
     * 全てのToDoを取得
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Symfony\Component\HttpFoundation\Response
    {
        $data = [
            'name' => 'フシギダネ',
        ];
        return response()->json($data, Response::HTTP_OK);
    }
}
