<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Session;
use Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            Session::flash('message', 'Login diperlukan untuk bisa mengakses halaman wpadmin');
            Session::flash('path', Request::path());
            Session::flash('full', Request::fullUrl());

            return route('wpadmin.auth.login');
        }
    }
}
