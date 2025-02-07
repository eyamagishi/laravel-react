<?php

namespace App\Http\Controllers;

use App\Consts\MessagesConst;

abstract class Controller
{
    private array $messages = [];
    private array $errors = [];

    /**
     * construct
     *
     */
    final public function __construct()
    {
        $this->messages = is_array(MessagesConst::MESSAGES) ? MessagesConst::MESSAGES : [];
        $this->errors = is_array(MessagesConst::ERRORS) ? MessagesConst::ERRORS : [];
    }

    /**
     * メッセージを取得
     *
     * @return array
     */
    protected function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * エラーを取得
     *
     * @return array
     */
    protected function getErrors(): array
    {
        return $this->errors;
    }
}
