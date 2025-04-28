<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckProductOwnership
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the product ID from the route parameters
        $productId = $request->route('product');
        
        if ($productId instanceof Product) {
            $productId = $productId->id;
        }
        
        // Find the product
        $product = Product::findOrFail($productId);
        
        if ($product->user_id !== Auth::id()) {

            abort(403, 'non hai il permesso di accesso su questo prodotto');
        }

        return $next($request);
    }
}
