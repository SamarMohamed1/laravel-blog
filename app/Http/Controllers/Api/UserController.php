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
    public function signup(RegisterRequest $request)
    {
        $input = $request->all();

        if(User::where('email',$input['email'])->exists()){
            return response()->json(["this email already has account"],403);
        }else{

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        return response()->json($success['token'] , 200);
        }
    }



        public function login(LoginRequest $request)

        {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

                $user = Auth::user();

                $success['token'] =  $user->createToken('MyApp')->plainTextToken;

               return response()->json($success['token'] , 200);

            }else{
                return response()->json("invalid email or password" , 403);
            }

        }


}
