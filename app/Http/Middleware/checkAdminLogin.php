<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Auth;
use View;
class checkAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // nếu user đã đăng nhập
        if (Auth::check()) {
            $user = Auth::user();
            // nếu level =1 (admin), status = 1 (actived) thì cho qua.
            $data = [
                'name' => isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email,
                'created_at' => isset(Auth::user()->created_at) ? Auth::user()->created_at : Carbon::now()
            ];
            View::share('data', $data);
            if ($user->level == 1 && $user->status == 1) {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->route('getLogin');
            }
        } else
            return redirect('admincp/login');

    }
}