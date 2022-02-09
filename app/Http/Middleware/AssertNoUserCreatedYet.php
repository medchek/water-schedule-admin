<?php

namespace App\Http\Middleware;

use App\Services\UserService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AssertNoUserCreatedYet
{
    /**
     * Handle admin creation account.
     * Only passses to the next route if no user exists in the database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userServices = new UserService();
        if ($userServices->isFirstUserCreated()) {
            return response("already created", Response::HTTP_FORBIDDEN);
        } else {
            return $next($request);
        }
    }
}
