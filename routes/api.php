<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/customer", [CustomerController::class, "store"]);
Route::get("/customer", [CustomerController::class, "index"]);
Route::get("/count_customer", [CustomerController::class, "countCustomerByCity"]);
Route::get("/count_customer_by_gender", [CustomerController::class, "countCustomerGenders"]);
Route::get("/customer/{id}", [CustomerController::class, "show"]);
Route::put("/customer/{id}", [CustomerController::class, "update"]);
Route::delete("/customer/{id}", [CustomerController::class, "destroy"]);
