<?php

namespace App\Http\Middleware;

use App\Models\Message;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MessageCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        View::share('messageCount', Message::count());
        return $next($request);
    }
}
