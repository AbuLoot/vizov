<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   /* public function handle($request, Closure $next, $role)
    {
        if ($this->auth->check() && Auth::user()->is($role)) {
            echo $role.' 1';exit();
            return $next($request);
        }
 
        return redirect()->guest('auth/login');
    }*/

    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }

        return $next($request);
    }
}
