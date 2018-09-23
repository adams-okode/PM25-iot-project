<?php

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
    return view('rooms');
});


Route::get('/view/room', function (\Illuminate\Http\Request $request) {
    return view('welcome',[
        'id'=> $request->id
    ]);
});

Route::get('/view/room/readings', 'ReadingController@viewRoomReadings');

Route::get('/heat/map', function () {
    return view('heat-map');
});

Route::get('/rooms', function () {
    return view('rooms');
});


Route::post('/room/createRoom','RoomController@createRoom');
Route::get('/room/deleteRoom','RoomController@deleteRoom');
Route::get('/room/getRoom','RoomController@getRoom');

Route::post('/wall/createWall','WallController@createWall');
Route::post('/wall/updateWall','WallController@updateWall');
Route::get('/wall/getWall','WallController@getWall');
Route::get('/wall/getClassified','WallController@getClassified');

Route::post('/sensor/createSensor','SensorController@createSensor');
Route::post('/sensor/updateSensor','SensorController@updateSensor');
Route::get('/sensor/deleteSensor','SensorController@deleteSensor');
Route::get('/sensor/getClassified','SensorController@getClassified');

Route::get('/reading/getClassified','ReadingController@getClassified');
Route::post('/reading/postReading','ReadingController@postReading');
Route::get('/reading/deleteAll','ReadingController@deleteAll');
Route::get('/reading/getBySensor','ReadingController@getBySensor');

