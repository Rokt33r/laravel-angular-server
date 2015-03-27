<?php

Route::get('/', function(Illuminate\Foundation\Inspiring $inspiring){

    $message = $inspiring->quote();

    return response(compact('message'), 200);
    
});
