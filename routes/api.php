<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RouteController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('apiTesting',function(){
    $data = [
        'message'=>'this is apiTesting message',
];
    return response()->json($data, 200);
});
// localhost:8000/api/apiTesting
Route::get('product/list',[RouteController::class,'productList']);
Route::get('category/list',[RouteController::class,'categoryList']);
Route::get('contact/list',[RouteController::class,'contactList']);
Route::get('order/list',[RouteController::class,'orderList']);

//post method
Route::post('create/category',[RouteController::class,'categoryCreate']);
Route::post('create/contact',[RouteController::class,'createContact']);
Route::get('delete/category/{id}',[RouteController::class,'deleteCategory']);
Route::post('category/details',[RouteController::class,'categoryDetails']);
Route::post('update/category',[RouteController::class,'updateCategory']);
