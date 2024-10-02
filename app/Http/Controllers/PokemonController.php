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
        $data = [
            'name' => 'フシギダネ',
        ];
        return response()->json($data, Response::HTTP_OK);
    }
}
