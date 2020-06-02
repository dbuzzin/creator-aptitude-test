<?php

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/api', function () {
    $jsonString = file_get_contents(base_path('resources/json/api.json'));
    $data = json_decode($jsonString, true);

    return response($data)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

Route::post('/api/update-url', 'UpdateJson@testChangeUrl');
