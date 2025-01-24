<?php

namespace App\Http\Controllers;

use App\Consts\MessagesConst;

abstract class Controller
{
    protected $messages = [];

    /**
     * construct
     *
     * @param AuthService $authService
     */
    public function __construct()
    {
        $this->messages = MessagesConst::MESSAGES;
    }
}
