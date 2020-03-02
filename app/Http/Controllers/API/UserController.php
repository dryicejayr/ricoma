<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Authentication;
use App\Http\Requests\API\createUser;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Users;

class UserController extends Controller
{
    public function auth(Authentication $request){
        $credentials = $request->only('user_name', 'password');
        $token = JWTAuth::attempt($credentials);
        if (!$token) {
            throw new JWTException('invalid username/password.');
        }else{
            $user = JWTAuth::user();
            return new TokenResource($user, $token);
        }
    }

    public function createUser(createUser $request){
        $user = new Users;
        $user->setFirstName($request->input('first_name'));
        $user->setLastName($request->input('last_name'));
        $user->setUserName($request->input('user_name'));
        $user->setEmail($request->input('email'));
        $user->setPassword($request->input('email'));
        $user->save();
        return new UserResource($user);
    }
}
