<?php

namespace App\Http\Middleware;

use Closure;

class ApiResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        header("Access-Control-Allow-Origin: *");

        // ALLOW OPTIONS METHOD
        $headers = [
            'Accept'=>'application/json',
            'Access-Control-Allow-Methods'=> 'POST, OPTIONS',
            'Access-Control-Allow-Headers'=> 'Content-Type, Accept, Authorization, X-Requested-With'
        ];
        $response = $next($request);

        if($request->getMethod()=='OPTIONS') {
            return  response('ok', 200)->withHeaders($headers);
        }

        foreach($headers as $key => $value)
            $response->header($key, $value);
        return $response;
    }
}
