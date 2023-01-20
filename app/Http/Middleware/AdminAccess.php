<?php

namespace App\Http\Middleware;

use App\Menu;
use Closure;

class AdminAccess
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
        $menu = Menu::where('url', $request->path())->first();

        if (!$menu) {
            return $next($request);
        } else {

            $access = [];
            $sessionAccess = session('accessible_menus');

            foreach ($sessionAccess as $item) {
                $access[] = $item;
            }

            if (count($access) <= 0) {
                abort(401, 'Anda belum memiliki akses ke menu apapun.');
            } elseif(!in_array($menu->id, $access)) {
                abort(401, 'Anda tidak mempunyai akses ke menu ini.');
            } else {
                return $next($request);
            }
        }
    }
}
