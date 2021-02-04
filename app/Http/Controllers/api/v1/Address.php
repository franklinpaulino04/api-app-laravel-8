<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\AddressModel;

class Address extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try
        {
            return response()->json(['data' => AddressModel::all(), 'result' => 1]);

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
                'name'        => 'required',
                'description' => 'required',
                'phone'       => 'required',
            ]);

            if($validator->fails())
            {
                return response()->json(['errors' => $validator->errors(), 'result' => 0 , 'msg' => 'Bad Request'],400);
            }
            else
            {
                AddressModel::create($request->all());

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try
        {
            $data = AddressModel::find($id);

            if(is_null($data))
            {
                return response()->json(['msg' => 'Bad Request', 'result' => 0],400);
            }

            return response()->json(['data' => $data, 'result' => 1]);

        } catch (\Exception $e)
        {
            return response()->json(['error' => 'The server encountered an unexpected condition which prevented it from fulfilling the request.', 'result' => 0],500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try
        {
            $validator = \Validator::make($request->all(), [
                'name'        => 'required',
                'description' => 'required',
                'phone'       => 'required',
            ]);

            if($validator->fails())
            {
                return response()->json(['errors' => $validator->errors(), 'result' => 0],400);
            }
            else
            {
                $data                   = AddressModel::find($id);

                if(is_null($data))
                {
                    return response()->json(['msg' => 'Bad Request', 'result' => 0],400);
                }
                else
                {
                    $data->name         = $request->name;
                    $data->description  = $request->description;
                    $data->phone        = $request->phone;
                    $data->save();
                }

                return response()->json(['result' => 1]);
            }

        } catch (\Exception $e)
        {
            return response()->json(['error' => 'The server encountered an unexpected condition which prevented it from fulfilling the request.', 'result' => 0],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try
        {
            $data = AddressModel::find($id);

            if(is_null($data))
            {
                return response()->json(['msg' => 'Bad Request', 'result' => 0],400);
            }

            AddressModel::destroy($id);
            
            return response()->json(['result' => 1]);

        } catch (\Exception $e)
        {
            return response()->json(['error' => 'The server encountered an unexpected condition which prevented it from fulfilling the request.', 'result' => 0],500);
        }
    }
}
