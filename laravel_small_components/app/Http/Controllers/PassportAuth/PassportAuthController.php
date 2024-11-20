<?php

namespace App\Http\Controllers\PassportAuth;

use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;

class PassportAuthController extends Controller
{
    public function loginAPI(Request $request)
    {
        $http = new GuzzleClient;
        try {
            $response = $http->post('http://localhost:8000/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => 2,  // Your client ID
                    'client_secret' => 'cjORdpkZ6IFLDWtE8dQe2wc5du49ISVIbhFknZC7', // Your client secret
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ],
            ]);
            return json_decode((string) $response->getBody(), true);
        } catch (Exception $err) {
            return response()->json(['error'=>$err->getMessage()]);
        }
    }
    public function testAPI(){
        dd("sa");
    }
}
