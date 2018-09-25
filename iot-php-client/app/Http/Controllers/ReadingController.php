<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadingController extends Controller
{
    //
    const BASE_URL = "http://localhost:8090/";

    /**
     * @param Request $request
     * @return
     */
    public function postReading(Request $request)
    {
        $url = self::BASE_URL . 'readings/post';
        $data = [
            "sensor_id" => $request->sensor_id,
            "value" => $request->value,
            "x" => $request->x,
            "y" => $request->y,

        ];

        $data = \App\Helpers\HTTPRequest::post($url, $data);
        return \App\Helpers\HTTPRequest::JsonResponse($data);

    }

    /**
     *
     * @return
     */
    public function deleteAll()
    {

        $url = self::BASE_URL . 'readings/deleteAll';
        \App\Helpers\HTTPRequest::delete($url, []);
        return redirect()->back()->with('success', 'message');

    }

    public function viewRoomReadings(Request $request)
    {

        $url = self::BASE_URL . 'sensor/roomClassified?room_id=' . $request->id;
        $data = \App\Helpers\HTTPRequest::get($url);

        $readings = [];
        foreach (json_decode($data->data)->data as $value) {
            # code...
            $url = self::BASE_URL . 'readings/sortBySensor?sensor_id=' . $value->id;
            $output = \App\Helpers\HTTPRequest::get($url);
            $readings[] = [
                'x' => $value->x2,
                'y' => $value->y2,
                'readings' => json_decode($output->data),
            ];
        }

        

        return view('readings', [
            'readings' => $readings,
            'id' => $request->id,
            'sensors'=>json_decode(json_decode(self::getClassified($request->id))->data)->data,
        ]);

    }


        /**
     * @param Request $request
    * @return 
    */
    public static  function getClassified($id){
        $url = self::BASE_URL.'sensor/roomClassified?room_id='.$id;
        $data = \App\Helpers\HTTPRequest::get($url);
        return \App\Helpers\HTTPRequest::JsonResponse($data);
    }

    /**
     * @param Request $request
     * @return
     */
    public function getBySensor(Request $request)
    {

        $url = self::BASE_URL . 'readings/getBySensor?sensor_id=' . $request->sensor_id;
        $data = [];
        \App\Helpers\HTTPRequest::post($url, $data);
        return redirect()->back()->with('success', 'message');
    }

}
