<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    //
    public function register(Request $request){
        $user = User::create($request->all()); 
        return response()->json($user,200);
    }

    public function login(Request $request){
        $credential = Request (['email', 'password']);
        if(!Auth::attempt($credential)){
            return response()->json(['error' => 'Unauthorized'], 401); 

        }
    }

    public function withToken($token){
        return response()-> json(
            [
                'access_token' => $token,
                'token_type' => 'bearer',
                //'user' => auth() -> user()
            ]
            );
    }

    public function getUsers(){
        $users = User::all(); 
        return response()->json($users,200); 
        
    }

    public function saveUser(Request $request){
        $user = User::create($request->all()); 
        return response()->json($user,200); 
    }

    public function deleteUser($id){
        $user = User::find($id); 
        if (!$user){
            return response()->json(
                ['message'=> 'Usuario no encontrado'], 404);
        }
        $user->delete(); 
    }

    public function updateUser(request $request, $id){
        $user = User::find($id);
        if(!$user){
            return response()->json(
                ['message' => 'Usuario no encontrado'], 404);
            }

            $user->update($request->all());
            return response()->json(
                ['message' => 'User with the id: '.$id .', updated'],200
            ); 
            
        }


}
