<?php

namespace App\Policies;

use App\Models\product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Product $product): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true; 
    }

    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->user_id || 
               $user->hasAnyRole(['reviewer', 'manager']);
    }

    public function delete(User $user, Product $product): bool
    {
    
        return $user->id === $product->user_id || 
               $user->hasAnyRole(['reviewer', 'manager']);
    }

    
    public function restore(User $user, Product $product): bool
    {
        return $user->hasRole('manager');
    }

    public function forceDelete(User $user, Product $product): bool
    {
        return $user->hasRole('manager');
    }
}