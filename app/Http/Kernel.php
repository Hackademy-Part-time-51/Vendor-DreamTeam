<?php

namespace App\Http;

use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    protected $middlewareAliases = [
      
        'role' => CheckRole::class,
    ];
}