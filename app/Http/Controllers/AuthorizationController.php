<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function index()
    {
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return "Authorization";
    }
}
