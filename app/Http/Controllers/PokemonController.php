<?php

namespace App\Http\Controllers;

use App\Services\PokemonService\PokemonServiceInterface as PokemonService;
use Illuminate\Http\JsonResponse;
// use Illuminate\Http\Request;

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
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = [
            'name' => 'フシギダネ',
        ];
        return response()->json($data, JsonResponse::HTTP_OK);
    }
}
