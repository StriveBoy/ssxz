<?php

namespace App\Http\Controllers\Api;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;


class UserController extends Controller
{
    public function register(Request $request){
        try {
            //获取到用户数据，并赋值给$user
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json([
                    'errCode' => 1004,
                    'errMsg' => '不存在的用户！',

                ]);
            }

            User::UpdateOrCreate(['id' => $user['id']], [
                'avatarUrl' => trim($request->avatarUrl),
                'nickName' => trim($request->nickName),
                'name' => trim($request->nickName),
                'country' => trim($request->country),
                'province' => trim($request->province),
                'city' => trim($request->city),
                'gender' => (int)$request->gender,
                'language' => trim($request->language),
            ]);

            return response()->json([
                'errCode' => 0,
                'errMsg' => 'register OK!',
                'data' => $request->all()
            ]);
        } catch (TokenExpiredException $e) {
            return response()->json([
                'errCode' => 1003,
                'errMsg' => 'token 过期' , //token已过期
            ]);
        } catch (TokenInvalidException $e) {
            return response()->json([
                'errCode' => 1002,
                'errMsg' => 'token 无效',  //token无效
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'errCode' => 1001,
                'errMsg' => '缺少token' , //token为空
            ]);
        }
    }
}
