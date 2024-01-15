<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetCountryCodeController extends Controller
{
    public function getCountryCode() 
    {
        $ip = \Request::ip();//Dynamic IP address get
        //$ip = '175.45.142.131'; //For static IP address get (JAPAN)
        //$ip = '103.100.137.255'; //For static IP address get (PHILIPPINES)
        //$ip = '85.214.132.117'; //For static IP address get (Germany)
        $data = \Location::get($ip);
        $locale = strtolower($data->countryCode);
        return $locale;
    }
}
