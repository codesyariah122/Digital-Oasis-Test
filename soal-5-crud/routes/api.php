<?php
// Teknikal Test Digital Oasis 2022
// File: app/BaseClass
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// 	return $request->user();
// });
Route::prefix('v1')->group(function () {
	Route::resource('/employee', EmployeeController::class);
	Route::post('/employee-sort', [EmployeeController::class, 'sorting_employee']);
	Route::post('/employee-search', [EmployeeController::class, 'search_employee']);
});
