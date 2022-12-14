<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;

class APIController extends Controller
{
    public function __construct()
    {
        $this->api_url = env('GIGYA_API_URL', 'https://accounts.eu1.gigya.com/accounts');
        $this->api_key = env('GIGYA_KEY', '3_TNCyYnERRjV-x7ONLsniHDM5fxA4Nmlkla4aq_vQLxAPX6sKpS8Y2dTpA8zyp5Zd');
        $this->api_secret = env('GIGYA_SECRET', 'K/za0BXbJ8uujVM8ZSxPZRp7zz6W7/Qo');
        $this->api_user_key = env('GIGYA_USER_KEY', 'AH3Gz5nncw87');
        $this->connection_string = 'apiKey=' . urlencode($this->api_key) . '&secret=' . urlencode($this->api_secret) . '&userKey=' . urlencode($this->api_user_key);
    }

    public function connect($endpoint, $method = 'POST', $string)
    {

        $url = $this->api_url . "." . $endpoint;
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
        );

        try {
            $curl = curl_init();

            if ($method == "POST") {

                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_URL => $url,
                    CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_POST => 1,
                    CURLOPT_POSTFIELDS => $string,
                    CURLOPT_HTTPHEADER => $headers,
                ));
            } elseif ($method == "GET") {

                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_URL => $url,
                    CURLOPT_USERPWD => $this->felix_token,
                    CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLINFO_HTTP_CODE => true,
                    CURLOPT_VERBOSE => true,
                ));
            } elseif ($method == "DELETE") {

                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_URL => $url,
                    CURLOPT_USERPWD => $this->felix_token,
                    CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_CUSTOMREQUEST => 'DELETE'
                ));
            } elseif ($method == "PATCH") {

                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_URL => $url,
                    CURLOPT_USERPWD => $this->felix_token,
                    CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_CUSTOMREQUEST => 'PATCH',
                    CURLOPT_POSTFIELDS => $string,
                    CURLOPT_HTTPHEADER => $headers,
                ));
            } elseif ($method == "PUT") {

                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_URL => $url,
                    CURLOPT_USERPWD => $this->felix_token,
                    CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_CUSTOMREQUEST => 'PUT',
                    CURLOPT_POSTFIELDS => $string,
                    CURLOPT_HTTPHEADER => $headers,
                ));
            }

            $exec = curl_exec($curl);
            $exec = json_decode($exec);

            $get_info = curl_getinfo($curl);

            $response = ["response" => $exec, "response_meta" => $get_info];

            curl_close($curl);

            return $response;
        } catch (Exception $exception) {

            if (curl_errno($ch)) {
                echo 'Curl error: ' . curl_error($ch);
            }

            return ['error', $exception->getMessage()];
        }
    }

    public function search($email)
    {
        $method = 'POST';
        $query = "SELECT * FROM accounts WHERE profile.email='$email'";
        $query = urlencode($query);
        $string = $this->connection_string . '&query=' . $query;
        $response = $this->connect(__FUNCTION__, $method, $string);
        return $response;
    }

    public function register(Request $request)
    {

        $method = 'POST';

        // STRING
        $query = [];

        // Password
        $query['password'] = $request->password;
        $query['email'] = $request->email;

        $query['data'] = json_encode([
            'is_Retail' => true,
            'isConsumer' => false,
            'isVerified' => true,
            'province' => $request->province ?? 28,
            'nombreDeEstablecimiento' => $request->name,
            'NIF' => $request->cif
        ]);

        $query['preferences'] = json_encode([
            'channel_email' => [
                'isConsentGranted' => true,
            ],
            'channel_sms' => [
                'isConsentGranted' => true,
            ],
            'terms' => [
                'aviso_legal' => [
                    'isConsentGranted' => true
                ],
                'BBLL_EG00_00Emisiones_Velca_Consumidor_2022' => [
                    'isConsentGranted' => true
                ],
            ],


            'privacy' => [
                'politicas_privacidad' => [
                    'isConsentGranted' => true
                ]
            ],

        ]);

        $query['profile'] = json_encode([
            'name' =>  $request->name,
            'lastName' =>  $request->name,
            'address' =>  $request->address,
            'zip' =>  $request->zip,
            'phones' =>  [
                'number' => $request->phone
            ],
        ]);

        $query['lang'] = 'ES';
        $query['finalizeRegistration'] = 'true';

        $query = http_build_query($query);
        $string = $this->connection_string . '&' . $query;
        $response = $this->connect(__FUNCTION__, $method, $string);

        return $response;
    }

    public function getAccountInfo($uid)
    {
        $method = 'POST';
        $string = $this->connection_string . '&uid=' . $uid;
        $response = $this->connect(__FUNCTION__, $method, $string);
        return $response;
    }

    public function setIsRetail($uid)
    {
        $method = 'POST';
        $query = [
            'uid' => $uid,
            'data' => '{"isRetail": true}'
        ];
        $query = http_build_query($query);

        $string = $this->connection_string . '&' . $query;
        $response = $this->connect('setAccountInfo', $method, $string);
        return $response;
    }
}
