<?php

namespace App\Http\Middleware;

use App\Exceptions\HazardousParam;
use App\Services\Iasteroid;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HazardousParamValidator
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        $hazardous = $request->get(Iasteroid::KEY_HAZARDOUS);
        if (
            $hazardous !== Iasteroid::HAZARDOUS_FALSE
            && $hazardous !== Iasteroid::HAZARDOUS_TRUE
            && $hazardous !== null
        ) {
            throw new HazardousParam($hazardous);
        }
        return $next($request);
    }
}
