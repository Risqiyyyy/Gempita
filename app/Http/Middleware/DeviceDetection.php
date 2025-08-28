<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;

class DeviceDetection
{
    public function handle($request, Closure $next, $device)
    {
        $agent = new Agent();

        if ($device === 'mobile' && !$agent->isMobile()) {
            return redirect()->route('home');
        }

        // if ($device === 'desktop' && $agent->isMobile()) {
        //     return redirect()->route('home');
        // }

        return $next($request);
    }
}
