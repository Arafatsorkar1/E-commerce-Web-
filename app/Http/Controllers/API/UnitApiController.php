<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitApiController extends Controller
{

    public  function  store(Request $request)
    {
        $validator = Validator::make($request ->all(),[
            'name' => 'required ',
            'code' => 'required ',
            'status' => 'required ',

        ]);
        if ($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors'=>$validator->messages()
            ],422);
        }
        else{
            $member=  Unit::storeUnit($request);

            if ($member)
            {
                return response()->json([
                    'status' => 200,
                    'message'=> "Unit created successfully"
                ],200);
            }
            else{
                return response()->json([
                    'status' => 500,
                    'message'=> "Unit could not be created"
                ],500);
            }
        }


    }

}
