<?php

namespace App\Http\Controllers;

use App\Models\GuzzlePost;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function postRequest()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://dog.ceo/api/breeds/image/random');
        $response = $request->getBody()->getContents();

        // dd($response);
        // dd(json_decode($response));

        $data=json_decode($response);


        $item = GuzzlePost::create([
            'message' => $data->message,
            'status' => $data->status
        ]);
    }
}
