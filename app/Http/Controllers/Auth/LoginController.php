<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserLoggedIn\UserLoggedInFacade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    function index(){
        return 'Authentication module - Login Controller';
    }

    function post(Request $request){
        $credentials = $request->only('username', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return \RS::send('invalid_credentials', Response::HTTP_UNAUTHORIZED);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return \RS::send('could_not_create_token', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // all good so return the token
        return \RS::send(compact('token'));
    }
}