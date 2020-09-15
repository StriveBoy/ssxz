<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Model\User;

class AuthController extends Controller
{
    public function auth(Request $request) {
        $app = app('wechat.mini_program');
        $data = $app->auth->session($request->code);
        $query = [
            'openid' => $data['openid'],
            'sessionKey' => $data['session_key'],
        ];

        $user = User::firstOrCreate(['openId' => $query['openid']], $query);

        $token = JWTAuth::fromUser($user);
        return response()->json([
            'errCode' => 0,
            'errMsg' => 'Get Token OK!',
            'data' => $token,
            'request' => $request->all(),
        ]);
    }
}
