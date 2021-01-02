<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    //
    public function create(Request $request){
        $data = ['error' => ''];

        $roles = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $roles);

        if($validator->fails()){
            $data['error'] = $validator->messages();
            return $data;
        }
        $email = $request->input('email');
        $password = $request->input('password');

        $user = new User();
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);  
        $user->token = '';
        $user->save();      

        return $data;
    }

    public function login(Request $request){
        $data = ['error' => ''];
        $creds = $request->only('email', 'password');
        if(Auth::attempt($creds)){
            $user = User::where('email', $creds['email'])->first();

            $timer = time().rand(0,9999);
            $token = $user->createToken($timer)->plainTextToken;
            $data['token'] = $token;
        }else{
            $data['error'] = 'email e/ou senha incorretos!';
        }
        return $data;
    }

    public function logout(Request $request){
        $data = ['error' => ''];
        $user = $request->user();
        $user->tokens()->delete();
        return $data;
    }
}
