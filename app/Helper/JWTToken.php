<?php

namespace App\Helper;

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class JWTToken
{
    public static function createToken($user_id, $user_email, $expiry = 86400): string
    {
        return self::generateToken($user_id, $user_email, $expiry);
    }

    public static function createResetToken($user_email): string
    {
        return self::generateToken(null, $user_email, 600);
    }

    private static function generateToken($user_id = null, $user_email, $expiry): string
    {
        $key = env('JWT_SECRET');
        $payload = [
            'iss'   => 'Invoice Management System',
            'iat'   => time(),
            'exp'   => time() + $expiry,
            'id'    => $user_id,
            'email' => $user_email
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function verifyToken($encoded_token)
    {
        try {
            $key = env('JWT_SECRET');
            return JWT::decode($encoded_token, new Key($key, 'HS256'));
        } catch (Exception $e) {
            return 'unauthorized';
        }
    }
}
