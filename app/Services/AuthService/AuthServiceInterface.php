<?php

namespace App\Services\AuthService;

use Illuminate\Http\Request;

interface AuthServiceInterface
{
    /**
     * リクエストから認証情報を設定
     *
     * @param Request $request リクエストインスタンス
     * @return array
     */
    public function setCredentials(Request $request): array;
}
