<?php

Route::get('/', function(Illuminate\Foundation\Inspiring $inspiring){

    $message = $inspiring->quote();

    return response(compact('message'), 200);

});

// Check if user has valid token
Route::get('auth', ['middleware' => 'jwt.auth', function(){
    $user = JWTAuth::parseToken()->toUser();

    return Response::json(compact('user'));
}]);

// Request token with email/name and password
Route::post('auth', function(){
    // grab credentials from the request
    $credentials = Input::only('email', 'password');

    try {
        // attempt to verify the credentials and create a token for the user
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
    } catch (JWTException $e) {
        // something went wrong whilst attempting to encode the token
        return response()->json(['error' => 'could_not_create_token'], 500);
    }

    // all good so return the token
    return response()->json(compact('token'));

});
