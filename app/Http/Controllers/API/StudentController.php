<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'string', 'max:30', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $errors = $validator->errors();

        if(!$validator->fails()){
            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'middle_name' => $request->middle_name,
                'role' => "student",
                'status' => "not_verified",
                'id_number' => $request->id_number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $studentInformation = User::where('email', $request->email)->first();

            $token = $studentInformation->createToken('authToken')->accessToken;

            $dataresponse = array(
                "token" =>$token,
                "information" => $studentInformation,
                "status" => true
            );

            return response()->json($dataresponse, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

       }else if($validator->fails()){

            $dataresponse = array(
                "token" =>null,
                "information" => null,
                "status" => false
            );

            return response()->json($dataresponse, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

       }
    }
}
