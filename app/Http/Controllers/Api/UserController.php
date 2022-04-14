<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function signup(RegisterRequest $request){

        $input = $request->all();

        if(User::where('email',$input['email'])->exists()){
            return response()->json(["this email already has account"],403);
        }else{

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return $this->success([
            'token' => $user->createToken('tokens')->plainTextToken
        ]);
       }
    }

    public function login(LoginRequest $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $user = Auth::user();
            return $this->success([
                'token' => $user->createToken('tokens')->plainTextToken
            ]);


        }else{
            return response()->json("invalid email or password" , 403);
        }



        // $attr = $request->validate([
        //     'email' => 'required|string|email|',
        //     'password' => 'required|string|min:6'
        // ]);

        // if (!Auth::attempt($attr)) {
        //     return $this->error('Credentials not match', 401);
        // }

        // return $this->success([
        //     'token' => auth()->user()->createToken('API Token')->plainTextToken
        // ]);

    }
}
