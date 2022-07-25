<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;

class SettingMiddleware
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
        view()->share('setting', Setting::first());
        view()->share('categories', Category::all());
        return $next($request);
    }
}
