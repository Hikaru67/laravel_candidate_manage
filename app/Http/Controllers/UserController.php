<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
use Hash;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function index()
    {
        $users = User::all();

        return response()->json($users, 200);
    }

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function register(Request $request){
        $user = $this->user->create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return response()->json([
            'status'=> 200,
            'message'=> 'User created successfully',
            'data'=>$user
        ]);
    }

    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['invalid_username_or_password'], 422);
            }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    /**
     * Check valid token and get user info
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserInfo(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = JWTAuth::toUser($request->token);
        return response()->json([
            'data' => [
                'user' => $user,
            ],
        ]);
    }
}
