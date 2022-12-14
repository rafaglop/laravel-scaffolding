<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class GigyaController extends Controller
{
    public function userVerification(Request $request)
    {
        $uid = null;
        $user = null;
        $response = null;

        /*
        if (isset($request->data['email'])) {
            dd("ok", $request->data);
        }
        */

        if (isset($request->data['email'])) {
            $user = User::where('email', trim($request->data['email']))->first();
        }

        if (isset($request->data['UID'])) {

            $uid = $request->data['UID'];

            if ($user) {
                // Si el email del usuario existe en la base de datos se actualiza con el UID de Gigya
                $user->update(['gigya_id' => $request->data['UID']]);
            }
        }

        if ($user) {

            if (!Auth::user()) {

                Auth::login($user);

                // Comprueba si es barista.
                Auth::user()->isRetail();

                $response = [
                    'action' => 'login',
                    'is_retail' => Auth::user()->isA('barista'),
                    'is_consumer' => Auth::user()->isA('consumer')
                ];
            } else {

                if (Auth::user()->gigya_id !== $uid) {
                    Auth::logout();
                    Auth::login($user);
                }

                $response = [
                    'action' => 'loggedIn',
                    'is_retail' => Auth::user()->isA('barista'),
                    'is_consumer' => Auth::user()->isA('consumer')
                ];
            }

            $this->checkUserData($user, $request);
        } else {

            if ($uid) {

                if (!$user) {
                    $user = new User();
                }

                $user->gigya_id = $uid;
                $user->name = isset($request->data['nickname']) ? $request->data['nickname'] : $request->data['email'];
                $user->email = $request->data['email'];
                $user->password = Hash::make(Str::random(8));

                if ($request->data['loginProvider'] == 'googleplus') {
                    $user->google_id = $request->data['loginProviderUID'];
                }

                if ($request->data['loginProvider'] == 'facebook') {
                    $user->facebook_id = $request->data['loginProviderUID'];
                }

                if ($request->data['loginProvider'] == 'twitter') {
                    $user->twitter_id = $request->data['loginProviderUID'];
                }

                $user->save();
                $user->assign('consumer');

                Auth::login($user);

                $response = [
                    'action' => 'login',
                    'is_retail' => Auth::user()->isA('barista'),
                    'is_consumer' => Auth::user()->isA('consumer')
                ];

                //return response()->json('login');

            } else {
                if (Auth::user()) {
                    Auth::logout();

                    $response = [
                        'action' => 'logout',
                    ];
                }
            }
        }

        return $response;
    }

    private function checkUserData($user, Request $request)
    {

        if ($user->name != $request->data['nickname']) {
            $user->update(['name' => $request->data['nickname']]);
        }
        if (!$user->google_id && $request->data['loginProvider'] == 'googleplus') {
            $user->update(['google_id' => $request->data['loginProviderUID']]);
        }
        if (!$user->facebook_id && $request->data['loginProvider'] == 'facebook') {
            $user->update(['facebook_id' => $request->data['loginProviderUID']]);
        }
        if (!$user->twitter_id && $request->data['loginProvider'] == 'twitter') {
            $user->update(['twitter_id' => $request->data['loginProviderUID']]);
        }
    }
}
