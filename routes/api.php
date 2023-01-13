<?php

use Illuminate\Http\Request;
use App\Url;
use App\Click;
use App\Http\Resources\UrlResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getAll/', function(Request $request){

        $data=Url::with(['clicksList']);
        return UrlResource::collection($data->get())->response();

        if ($data) {

            return response()->json($data);
        } else {
            return response()->json(['message'=>'Data not found!','status'=>'404']);
        }




});