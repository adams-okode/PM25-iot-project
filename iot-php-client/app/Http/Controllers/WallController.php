<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WallController extends Controller
{
    //
    const BASE_URL = "http://localhost:8090/"; 

    
    /**
     * @param Request $request
     * @return 
     */
    public function createWall(Request $request){
        $url = self::BASE_URL.'Walls/create';
        $data = [
            "room_id"=> $request->id,
            "x1"=> $request->x1,
            "x2"=> $request->x2,
            "y1"=> $request->y1,
            "y2"=> $request->y2
        ];

        $response =  \App\Helpers\HTTPRequest::post($url, $data);
        return \App\Helpers\HTTPRequest::JsonResponse($response);
        //return redirect()->back()->with('success','message');
    }



    /**
     * @param Request $request
     * @return 
     */
    public function updateWall(Request $request){
        $url = self::BASE_URL.'Walls/delete?id='.$request->id;
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
    public function getWall(Request $request){
        $url = self::BASE_URL.'Walls/getAll';
        $data = \App\Helpers\HTTPRequest::get($url);
        return redirect()->back()->with([
            'success'=>'message',
            'Walls' => $data->data->data
        ]);
    }


    /**
     * @param Request $request
     * @return 
     */
    public function getClassified(Request $request){
        $url = self::BASE_URL.'Walls/roomClassified?room_id='.$request->id;
        $data = \App\Helpers\HTTPRequest::get($url);
        return \App\Helpers\HTTPRequest::JsonResponse($data);
        
    }
}
