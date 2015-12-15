<?php

namespace App\Http\Controllers;

use Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class GeoController extends BaseController
{
    public function search(){
      $location = Request::all();
      $maps_url =  'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($location['location']);
		  $maps_json = file_get_contents($maps_url);
		  $maps_array = json_decode($maps_json,true);

      $lat = $maps_array['results'][0]['geometry']['location']['lat'];
 		  $lng = $maps_array['results'][0]['geometry']['location']['lng'];

      $time = time();
		  $time_delay = $time-3600;
		  $instagram_url = 'https://api.instagram.com/v1/media/search?lat='.$lat.'&lng='.$lng.'&max_timestamp='.$time.'$min_timestamp='.$time_delay.'&client_id=165301c23525430788db2fd7938a3411';
		  $instagram_json = file_get_contents($instagram_url);
		  $instagram_array = json_decode($instagram_json,true);

      return view('pages.geopic-injected',compact('instagram_array'));

    }
}
