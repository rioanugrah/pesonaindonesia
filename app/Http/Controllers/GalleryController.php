<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HTTP_Request2;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->whatsapp = ['nomor' => env('WA_BUSINESS'), 'message' => env('WA_MESSAGE')];
    }
    public function index()
    {
        $data['whatsapp'] = $this->whatsapp;

        $fields = 'id,media_type,media_url,username,timestamp';
        $accessToken = env('IG_TOKEN');
        $galleryLink = new HTTP_Request2();
        $galleryLink->setUrl('https://graph.instagram.com/me/media?fields='.$fields.'&'.'access_token='.$accessToken);
        $galleryLink->setMethod(HTTP_Request2::METHOD_GET);
        $galleryLink->setConfig(array(
        'follow_redirects' => TRUE
        ));

        try {
            $response = $galleryLink->send();
            if ($response->getStatus() == 200) {
                $dataUrl = json_decode($response->getBody(),true);
                // $dataUrl = $response->getBody();
                // echo $response->getBody();
                // echo json_encode($dataUrl['data']);
                // $data['gallerys'] = json_encode($dataUrl['data']);
                // echo $data['gallerys'];
                $data['gallerys'] = $dataUrl;
                return view('frontend.frontend4.gallery.index',$data);

            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
