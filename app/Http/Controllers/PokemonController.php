<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * 全てのToDoを取得
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Symfony\Component\HttpFoundation\Response
    {
        return response()->json([], Response::HTTP_OK);
    }
}
