<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class RoleAdmin
{
    public function handle(Request $request) 
    {
        if (Auth::user()->role === 'admin') {
            app()->route->redirect('/adminhello');
        }
        return redirect('/hello');
    }
}