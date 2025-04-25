<?php

namespace App\Http;

use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    /**
     * The application's route middleware.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
       
        'role' =>CheckRole::class,
    ];
}