<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/images/{numpiece}/{filename}', function (string $numpiece, string $filename) {
    $path = public_path('/storage/images/' . $numpiece . '/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});

Route::get('/images/{numpiece}/{numero}/{filename}', function (string $numpiece, string $numero, string $filename) {
    $path = public_path('/storage/images/' . $numpiece . '/' . $numero . '/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});

