<?php

use Illuminate\Http\Request;

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

Auth::routes();
Route::prefix('/navigation')->group(function () {
    Route::get('', 'HomeController@navMain');
    Route::get('/cars', 'HomeController@carsNav');
    Route::get('/spares', 'HomeController@sparesNav');
});
Route::prefix('/cars')->group(function () {
    Route::get('', 'FieldsController@washingBays');
});
Route::prefix('/spare')->group(function () {
    Route::get('', 'FieldsController@spareParts');
});
Route::prefix('/maker')->group(function () {
    Route::get('', 'FieldsController@spareParts');
});
Route::prefix('/shops')->group(function () {
    Route::get('', 'FieldsController@spareParts');
});
Route::prefix('/bays')->group(function () {
    Route::get('', 'FieldsController@washingBays');
});
Route::prefix('/schools')->group(function () {
    Route::get('', 'FieldsController@washingBays');
});
Route::prefix('/bonds')->group(function () {
    Route::get('', 'FieldsController@washingBays');
});
Route::prefix('/stores')->group(function () {
    Route::get('', 'FieldsController@washingBays');
});
Route::prefix('/sellers')->group(function () {
    Route::get('', 'FieldsController@washingBays');
});
Route::prefix('/stations')->group(function () {
    Route::get('', 'FieldsController@washingBays');
});
Route::get('/home', 'HomeController@homeMain');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
