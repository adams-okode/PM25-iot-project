<?php

namespace App\Helpers;

class HTTPRequest
{
    /**
     * @param String
     * @param Array
     * @return
     */
    public static function post(String $url, array $data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {

            return json_decode(json_encode([
                'status_code' => 200,
                'data' => [],
                'message' => $err,
            ]));

        } else {
            return json_decode(json_encode([
                'status_code' => 200,
                'data' => $response,
                'message' => '',
            ]));
        }
    }

    /**
     * @param String
     * @return
     */
    public static function get(String $url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            return json_decode(json_encode([
                'status_code' => 200,
                'data' => [],
                'message' => $err,
            ]));

        } else {
            return json_decode(json_encode([
                'status_code' => 200,
                'data' => $response,
                'message' => '',
            ]));
        }
    }

    public static function put(String $url, array $data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Content-Type: application/json",

            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            return json_decode(json_encode([
                'status_code' => 200,
                'data' => [],
                'message' => $err,
            ]));

        } else {
            return json_decode(json_encode([
                'status_code' => 200,
                'data' => $response,
                'message' => '',
            ]));
        }
    }

    public static function delete(String $url, array $data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Content-Type: application/json",

            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            return json_decode(json_encode([
                'status_code' => 200,
                'data' => [],
                'message' => $err,
            ]));

        } else {
            return json_decode(json_encode([
                'status_code' => 200,
                'data' => $response,
                'message' => '',
            ]));
        }

    }


    public static function JsonResponse($data){

        return json_encode($data);
        
    }

}
