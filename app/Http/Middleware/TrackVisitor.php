<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $sessionId = $request->session()->getId();
        $userAgent = $request->userAgent();

        // Check if visitor already exists for this session
        $existingVisitor = Visitor::where('ip_address', $ip)
            ->where('session_id', $sessionId)
            ->first();

        if (! $existingVisitor) {
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'session_id' => $sessionId,
            ]);
        }

        return $next($request);
    }
}
