<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use GuzzleHttp\Client;


class RecaptchaController extends Controller
{

    public function checkValidity(Request $request)
    {
        $token = $request->json('token');

        if (!$token || empty($token)) {
            return response()->json(["message" => "token is empty while checking recaptcha"]);
        }

        $url = sprintf(
            'https://www.google.com/recaptcha/api/siteverify?secret=%s&response=%s',
            env('RECAPTCHA_SECRET'),
            $token
        );

        $client = new Client();
        $response = $client->request('GET', $url);
        return $response->getBody();
    }

}
