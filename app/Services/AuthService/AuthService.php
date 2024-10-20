<?php

namespace App\Services\AuthService;

use Illuminate\Http\Request;

class AuthService implements AuthServiceInterface
{
    /**
     * @inheritDoc
     */
    public function setCredentials(Request $request): array
    {
        return [
            'email' => $request->email,
            'password' => $request->password
        ];
    }
}
