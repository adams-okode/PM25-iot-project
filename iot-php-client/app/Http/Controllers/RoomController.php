<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    const BASE_URL = "http://localhost:8090/"; 


    /**
     * @param Request $request
     * @return 
     */
    public function createRoom(Request $request){
        $url = self::BASE_URL.'rooms/create';
        $data = [
            "name"=> $request->name,
            "status"=>'ACTIVE',
            "walls"=> 4
        ];
        $data = \App\Helpers\HTTPRequest::post($url, $data);
        return \App\Helpers\HTTPRequest::JsonResponse($data);
    }



    /**
     * @param Request $request
     * @return 
     */
    public function deleteRoom(Request $request){
        $url = self::BASE_URL.'rooms/delete?id='.$request->id;
        $data = [];

        \App\Helpers\HTTPRequest::delete($url, $data);
        return redirect()->back()->with('success','message');
    }


    /**
     * @param Request $request
     * @return 
     */
    public function getRoom(Request $request){
        $url = self::BASE_URL.'rooms/getAll';
        $data = \App\Helpers\HTTPRequest::get($url);

        return \App\Helpers\HTTPRequest::JsonResponse($data);
    }
}
