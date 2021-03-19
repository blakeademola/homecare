<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Session\Store;
use App\Eloquent\Interfaces\AuthInterface as Authentication;

class AuthenticationMiddleware
{
    /**
     * @var Authentication
     */
    private $auth;
    /**
     * @var SessionManager
     */
    private $session;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Redirector
     */
    private $redirect;
    /**
     * @var Application
     */
    private $application;

    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        if (!auth()->check()) {

            // Redirect to the login page
            return redirect()->route('login');
        }
        if ($request->url() == route('adminDashboard') && auth()->user()->user_type == 'USER') {
            return redirect()->route('dashboard');
        }

        return $next($request);

    }

}
