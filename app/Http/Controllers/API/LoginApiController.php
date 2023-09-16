<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Illuminate\Process\input;

class LoginApiController extends Controller
{

        public function apiLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        }

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (auth()->attempt($credentials)) {

            return response()->json([
                'status' => 200,
                'message' => 'Login successful',
                'user' => auth()->user(),
            ], 200);
        } else {

            return response()->json([
                'status' => 401,
                'message' => 'Login failed. Invalid credentials.',
            ], 401);
        }
    }




}
