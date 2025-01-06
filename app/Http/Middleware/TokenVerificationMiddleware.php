<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helper\JWTToken;

class TokenVerificationMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $decoded_token = JWTToken::verifyToken($request->cookie('token'));
            if ($decoded_token == 'unauthorized') {
                return redirect('/login');
            } else {
                $request->headers->set('id', $decoded_token->id);
                $request->headers->set('email', $decoded_token->email);

                return $next($request);
            }
        } catch (Exception $e) {
        }

        return $next($request);
    }
}
