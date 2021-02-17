<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:5|max:255']
        ]);

        $errors = $validator->errors();

        if(!$validator->fails()){

            $studentInformation = DB::table('users')
                                ->where('email', $request->email)
                                ->first();

            if(!empty($studentInformation)){
                $enteredPassword = $request->password;
                $DBpassword = $studentInformation->password;
                $DBemail = $studentInformation->email;
                $enteredEmail = $request->email;

                $password = Hash::check($enteredPassword, $DBpassword);
                $userinfo = User::where('email', $request->email)->first();

                if($password && $enteredEmail === $DBemail){

                    $token = $userinfo->createToken('authToken')->accessToken;

                    $dataresponse = array(
                        "token" => $token,
                        "information" => $studentInformation,
                        "status" => true
                    );

                }else{

                    $dataresponse = array(
                        "token" =>null,
                        "information" => null,
                        "status" => false
                    );
                }
            }else{

                $dataresponse = array(
                    "token" =>null,
                    "information" => null,
                    "status" => false
                );

            }

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
