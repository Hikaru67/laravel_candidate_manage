<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Validate user data
     * Create a new user
     * Login this user and return token
     *
     * @return UserResource|void
     */
    public function register(Request $request)
    {
        // validate dữ liệu
        try {
            $this->validate($request, [
                'username' => 'required|unique:users|string',
                'name' => 'required',
                'email' => 'required|unique:users,email|email',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
        }

        $user = User::create([
            'username' => $request->get('username'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        // sau khi lưu dữ liệu user mới vào CSDL, tiến hành đăng nhập luôn rồi trả về token đăng nhập
        if(!$token = JWTAuth::attempt($request->only(['username', 'password'])))
        {
            return abort(401);
        }
        return (new UserResource($user))
            ->additional([
                'meta' => [
                    'token' => $token
                ]
            ]);
    }

    /**
     * Login user, making a new token
     *
     * @param Request $request
     * @return UserResource|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(!$token = JWTAuth::attempt($request->only(['username', 'password'])))
        {
            return response()->json([
                'errors' => [
                    'username' => ['There is something wrong! We could not verify details']
                ]], 422);
        }

        return (new UserResource($request->user()))
            ->additional([
                'meta' => [
                    'token' => $token
                ]
            ]);
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'status' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    /**
     * Check valid token
     * return user data
     *
     * @return array
     */
    public function user(): array
    {
        return [
            'data' => JWTAuth::parseToken()->authenticate()
        ];
    }
}
