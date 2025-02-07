<?php

namespace App\Http\Controllers;

use App\Services\AuthService\AuthServiceInterface as AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    protected AuthService $authService;

    /**
     * construct
     *
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * ログイン機能
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = $this->authService->setCredentials($request);
        if (Auth::attempt($credentials)) {
            /**
             * TODO:
             * $user = $request->user() のときの createToken() では波線が出ないが
             * $user = Auth::user() のときの createToken() では波線が出てくる
             * 考えられる原因:
             * - IDE のキャッシュの問題
             * - ファイルのオートロードの問題
             * - Auth ファサードが利用可能か確認
             * - Intelephense の設定
             */
            // $user = Auth::user();
            $user = $request->user();
            $token = $user->createToken('AccessToken')->plainTextToken;

            return response()->json(
                ['token' => $token],
                JsonResponse::HTTP_OK
            );
        } else {
            return response()->json(
                ['error' => $this->getErrors()['auth_failure']], 
                JsonResponse::HTTP_UNAUTHORIZED
            );
        }
    }

    /**
     * ユーザー情報返却
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function user(Request $request): JsonResponse
    {
        return response()->json([
            'name'  => $request->user()->name,
            'email' => $request->user()->email,
        ], JsonResponse::HTTP_OK);
    }

    /**
     * ログアウト機能
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            $user = $request->user();
            if ($user) {
                $user->currentAccessToken()->delete();
            }

            return response()->json(
                ['message' => $this->getMessages()['logout']],
                JsonResponse::HTTP_OK
            );
        } catch (\Exception $e) {
            return response()->json(
                ['error' => $this->getErrors()['logout_failed']],
                JsonResponse::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
