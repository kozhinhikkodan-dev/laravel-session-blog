<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IpBlock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,String $message, String $ip): Response
    {
        info('Requesting from IP '.$request->ip());

        $blockedIps = [
            '38.0.101.76',
            '127.0.0.2',
        ];

        if(in_array($request->ip(), $blockedIps)){

            if($request->ip() != $ip){
                $message = 'You are blocked from your IP';
            }
            abort(403,$message);
            // return view('errors.403');

            // return redirect(route('login'));
        }

        return $next($request);
    }
}
