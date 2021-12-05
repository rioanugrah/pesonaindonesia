<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat()
    {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://plesiranindonesia.com/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
        echo $output;
    }
}
