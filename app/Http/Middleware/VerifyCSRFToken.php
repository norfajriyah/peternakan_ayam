<?php

namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Foundation\Configuration\Middleware;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCSRFToken extends Middleware
{
    protected $except = [
        'api/register'
    ];
}
