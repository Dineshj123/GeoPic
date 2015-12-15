<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class PagesController extends BaseController
{
    public function show(){

       return view('pages.geopic');
    }
}
