<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }



    function register(Request $request)
    {
        $rules = [
            'username' => ['required', 'string', 'max:500'],
            'email' => ['required', 'string', 'max:500', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $credentials = $request->all();

        $validator = Validator::make($credentials, $rules);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()->all()], 422);
        }

        $data = $request->all();
        try {
            DB::beginTransaction();
            
            $user = User::create($data);

            $token = JWTAuth::fromUser($user);

            DB::commit();

            return $this->respondWithToken($token);
        }  catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e], 422);
        }
    }

    public function username($login)
    {

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return $field;
    }




    public function login(Request $request, JWTAuth $JWTAuth)
    {
        $credentials = $request->all();

        $rules = [
            'identity' => 'required|string',
            'password' => 'required|string',
            'email' => 'string|exists:users',
            'username' => 'string|exists:users',
        ];

        $messages = [
            'identity.required' => 'Email/Username is required',
            'email.exists' => 'Email is already registered',
            'username.exists' => 'username is already registered',
            'password.required' => 'Password cannot be empty',
        ];


        $validator = Validator::make($credentials, $rules, $messages);


        if ($validator->fails()) {
            return response()->json(['code' => 422,'errors' => $validator->messages()->all()], 422);
        }

        $field = $this->username($credentials['identity']);

        $credentials[$field] = $credentials['identity'];

        unset($credentials['identity']);


        if ($token = JWTAuth::attempt($credentials)) {

            return $this->respondWithToken($token);
        } else {
            return response()->json(['message' => 'Sorry your Credentials are not correct'], 401);
        }
    }

    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }


    public function allUsers()
    {
         return response()->json(['users' =>  User::all()], 200);
    }


    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

}
