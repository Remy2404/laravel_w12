<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrimStrings
{
    /**
     * The attributes that should not be trimmed.
     *
     * @var array<int, string>
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $inputs = $request->all();
        
        foreach ($inputs as $key => $value) {
            if (is_string($value) && !in_array($key, $this->except)) {
                $inputs[$key] = trim($value);
            }
        }
        
        $request->merge($inputs);
        
        return $next($request);
    }
}
