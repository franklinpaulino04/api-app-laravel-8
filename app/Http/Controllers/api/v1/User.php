<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User as UserModel;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try
        {
            $user = \App\Models\User::whereEmail($request->email)->first();

            if(!is_null($user) && Hash::check($request->password, $user->password))
            {
                $toke = $user->createToken('api-app')->accessToken;

                return response()->json(['result' => 1, 'token' => $toke]);
            }
            else
            {
                return response()->json(['msg' => 'Bad Request', 'result' => 0],400);
            }

        } catch (\Exception $e)
        {
            return response()->json(['error' => 'The server encountered an unexpected condition which prevented it from fulfilling the request.', 'result' => 0],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try
        {
            $validator = \Validator::make($request->all(), [
                'email'        => 'required',
                'password'     => 'required',
            ]);

            if($validator->fails())
            {
                return response()->json(['errors' => $validator->errors(), 'result' => 0 , 'msg' => 'Bad Request'],400);
            }
            else
            {
                $data             = $request->all();
                $data['password'] = Hash::make($request->password);

                UserModel::create($data);

                return response()->json(['result' => 1]);
            }

        } catch (\Exception $e)
        {
            return response()->json(['error' => 'The server encountered an unexpected condition which prevented it from fulfilling the request.', 'result' => 0],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try
        {
            $user = auth()->user();
            $user->token()->revoke();

            return response()->json(['result' => 1]);

        } catch (\Exception $e)
        {
            return response()->json(['error' => 'The server encountered an unexpected condition which prevented it from fulfilling the request.', 'result' => 0],500);
        }
    }
}
