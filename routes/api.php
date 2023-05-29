<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Operator;
use App\Models\Partner;
use App\Models\Supplier;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [AuthController::class, 'createToken']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/operators', function () {
        return Operator::all();
    });

    Route::get('/partners', function() {
        return Partner::all();
    });

    Route::get('/suppliers', function() {
        return Supplier::all();
    });

    Route::get('/supplier/{id}', function($id) {
        $supplier = Supplier::findOrFail($id);
        return $supplier;
    });

    Route::post('/supplier', function(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'oib' => 'required|string|size:11',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'visible_to_all' => 'required|boolean'
        ]);

        if($validator->fails()) {
            return response()->json(['message' => 'Bad request']);
        }

        return response()->json(['message' => 'Dobavljač dodan!']);
    });

    Route::delete('/supplier/{id}', function($id) {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return response()->json(['message' => 'Partner deleted success']);
    })->middleware('can:partner-one');
});

Route::middleware('auth:sanctum')->get('/allOperators', function() {
    return Operator::all();
});