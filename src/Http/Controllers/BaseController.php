<?php

namespace PaladinDigital\Blog\Http\Controllers;

use \Auth;
use \View;
use Taskforcedev\LaravelSupport\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        $data = $this->buildData();

        if (Auth::check()) {
            $user = Auth::user();
            $data['user'] = $user;
            $data['user_id'] = $user->id;
        } else {
            $userClass = config('auth.providers.users.model');
            $data['user'] = new $userClass;
        }
        View::share($data);
    }
}
