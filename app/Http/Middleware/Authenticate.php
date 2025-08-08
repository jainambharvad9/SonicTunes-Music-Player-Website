<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    protected function redirectTo($request)
{
    if ($request->expectsJson()) {
        return null;
    }

    if ($request->is('admin') || $request->is('admin/*')) {
        return route('admin.login');
    }

    return route('login');
}

}
