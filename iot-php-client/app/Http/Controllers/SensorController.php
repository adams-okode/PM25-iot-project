<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorController extends Controller
{
    const BASE_URL = "http://localhost:8090/"; 


    /**
     * @param Request $request
    * @return 
    */
    public function createSensor(Request $request){
        $url = self::BASE_URL.'sensor/create';
        $data = [
            "room_id"=> $request->id,
            "x2"=> $request->x1,
            "y2"=> $request->y1,
            "tag"=> $request->tag,
        ];

        $response = \App\Helpers\HTTPRequest::post($url, $data);
        return \App\Helpers\HTTPRequest::JsonResponse($response);
    }



    /**
     * @param Request $request
    * @return 
    */
    public function updateSensor(Request $request){
        $url = self::BASE_URL.'sensor/update';
        $data = [
            "id"=> $request->id,
            "x1"=> $request->x1,
            "x2"=> $request->x2,
            "y1"=> $request->y1,
            "y2"=> $request->y2
        ];

        \App\Helpers\HTTPRequest::put($url, $data);
        return redirect()->back()->with('success','message');
    }



    /**
     * @param Request $request
    * @return 
    */
    public function deleteSensor(Request $request){
        $url = self::BASE_URL.'sensor/delete?id='.$request->id;
        $data = [
            "id"=> $request->id,
            "x1"=> $request->x1,
            "x2"=> $request->x2,
            "y1"=> $request->y1,
            "y2"=> $request->y2
        ];

        \App\Helpers\HTTPRequest::delete($url, $data);
        return redirect()->back()->with('success','message');
    }




    /**
     * @param Request $request
    * @return 
    */
    public function getSensor(Request $request){
        $url = self::BASE_URL.'sensor/getAll';
        $data = \App\Helpers\HTTPRequest::get($url);
        return redirect()->back()->with([
            'success'=>'message',
            'Sensors' => $data->data->data
        ]);
    }


    /**
     * @param Request $request
    * @return 
    */
    public function getClassified(Request $request){
        $url = self::BASE_URL.'sensor/roomClassified?room_id='.$request->id;
        $data = \App\Helpers\HTTPRequest::get($url);
       
        return \App\Helpers\HTTPRequest::JsonResponse($data);
    }
}
