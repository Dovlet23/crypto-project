<?php

namespace App\Http\Controllers;


use App\Http\Resources\Crypto\CryptoResource;
use App\Http\Resources\Crypto\CryptoResources;
use App\Models\Crypto;
use Illuminate\Http\Request;



class CryptoController extends Controller
{
    public function index()
    {
        $result = Crypto::get();
        return response()->json(
            new CryptoResources($result)
        );
    }

    public function store(Request $request)
    {
        try {
            $create = Crypto::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'symbol' => $request->input('symbol'),
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => $exception->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
           $model = Crypto::find($id);
           return response()->json(
               new CryptoResource($model)
           );
        } catch (\Exception $exception) {
            return response()->json([
                "message" => $exception->getMessage()
            ], 500);
        }
    }
    public function update(int $id, Request $request)
    {
        try {
            Crypto::where('id','=', $id)
                ->update([
                   'name' => $request->input('name'),
                   'price' => $request->input('price'),
                   'description' => $request->input('description'),
                   'symbol' => $request->input('symbol'),
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }

    }

    public function delete(int $id)
    {

            Crypto::destroy($id);
            return response()->json([
                'message' => 'удален'
            ]);



    }

}
