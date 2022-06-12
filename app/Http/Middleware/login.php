<?php
namespace app\http\middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if(!Auth::check()){
          return redirect('login');
        }
        $user = Auth::User();
        if ($user->level == $role) {
          return $next($request);
        }
        return redirect('login')->with('Error','Akses DiTolak');
    }
}