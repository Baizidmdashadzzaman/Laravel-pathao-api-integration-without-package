<?php

namespace App\Http\Controllers;

use App\Models\PathaoApi;
use Illuminate\Http\Request;

class PathaoApiController extends Controller
{

    public function access_info(){

        $curl = curl_init();
        $token_postdata = [

            'client_id'     => "267",//put your pathao merchant client id
            'client_secret' => "wRcaibZkUdSNz2EI9ZyuXLlNrnAv0TdPUPXMnD39",//put your pathao merchant client secret
            'username'      => "test@pathao.com",//put your pathao merchant user name
            'password'      => "lovePathao",//put your pathao merchant password
            'grant_type'    => "password",//write only "password"
        ];

        curl_setopt_array($curl,
            [
                CURLOPT_URL=> "https://api-hermes.pathao.com/aladdin/api/v1/issue-token",
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_ENCODING=>"",
                CURLOPT_MAXREDIRS=>10,
                CURLOPT_TIMEOUT=>10,
                CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=>"POST",
                CURLOPT_POSTFIELDS   => json_encode($token_postdata),
                CURLOPT_HTTPHEADER   => array(
                        "cache-control:no-cache",
                        "content-type:application/json"
                    )
            ]
        );

        $token_response            = curl_exec($curl);
        $AuthorizationInfo         = json_decode($token_response);

        return $AuthorizationInfo;
    }

    public function city_list(){
        $curl = curl_init();
        curl_setopt_array($curl,
            [
                CURLOPT_URL=> "https://api-hermes.pathao.com/aladdin/api/v1/countries/1/city-list",
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_ENCODING=>"",
                CURLOPT_MAXREDIRS=>10,
                // CURLOPT_TIMEOUT=>10,
                CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=>"GET",
                CURLOPT_HTTPHEADER   => array(
                        "cache-control:no-cache",
                        "content-type:application/json",
                        "Authorization:Bearer ". @$this->access_info()->access_token //access token from access info method
                    )
            ]
        );
        $response = curl_exec($curl);
        $cities = json_decode($response);
        if(@$cities->data->data == null):
            //return [];
        else:
            //return @$cities->data->data;
        endif;
        //dd($cities->data->data);
        return view('pathao.citylist',compact('cities'));
    }

    public function zone_list($city_id,$city_name){
        //dd($city_name);
        $curl = curl_init();
        curl_setopt_array($curl,
            [
                CURLOPT_URL=> "https://api-hermes.pathao.com/aladdin/api/v1/cities/".$city_id."/zone-list",
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_ENCODING=>"",
                CURLOPT_MAXREDIRS=>10,
                // CURLOPT_TIMEOUT=>10,
                CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=>"GET",
                CURLOPT_HTTPHEADER   => array(
                        "cache-control:no-cache",
                        "content-type:application/json",
                        "Authorization:Bearer ". @$this->access_info()->access_token //access token from access info method
                    )
            ]
        );
        $response = curl_exec($curl);
        $zones         = json_decode($response);
        if(@$zones->data->data == null):
            //return [];
        else:
            //return @$zones->data->data;
        endif;
        return view('pathao.zonelist',compact('zones','city_id','city_name'));
        //dd($zones);
    }

    public function area_list($zone_id,$zone_name,$city_id,$city_name){
        $curl = curl_init();
        curl_setopt_array($curl,
            [
                CURLOPT_URL=> "https://api-hermes.pathao.com/aladdin/api/v1/zones/".$zone_id."/area-list",
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_ENCODING=>"",
                CURLOPT_MAXREDIRS=>10,
                // CURLOPT_TIMEOUT=>10,
                CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=>"GET",
                CURLOPT_HTTPHEADER   => array(
                        "cache-control:no-cache",
                        "content-type:application/json",
                        "Authorization:Bearer ". @$this->access_info()->access_token //access token from access info method
                    )
            ]
        );

        $response = curl_exec($curl);
        $areas         = json_decode($response);
        //return $areas->data->data;

        return view('pathao.arealist',compact('areas','zone_id','zone_name','city_id','city_name'));
    }


}
