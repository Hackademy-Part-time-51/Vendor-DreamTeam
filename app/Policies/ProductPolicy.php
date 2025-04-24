<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Tutti possono vedere l'elenco dei prodotti
    }

    public function view(User $user, Product $product): bool
    {
        return true; // Tutti possono vedere i dettagli di un prodotto
    }

    public function create(User $user): bool
    {
        return true; // Tutti gli utenti autenticati possono creare prodotti
    }

    public function update(User $user, Product $product): bool
    {
        // Gli utenti possono modificare solo i propri prodotti
        // I revisori e i manager possono modificare qualsiasi prodotto
        return $user->id === $product->user_id || 
               $user->isReviewer() || 
               $user->isManager();
    }

    public function delete(User $user, Product $product): bool
    {
        // Gli utenti possono eliminare solo i propri prodotti
        // I revisori e i manager possono eliminare qualsiasi prodotto
        return $user->id === $product->user_id || 
               $user->isReviewer() || 
               $user->isManager();
    }

    public function restore(User $user, Product $product): bool
    {
        // Solo i manager possono ripristinare i prodotti eliminati
        return $user->isManager();
    }

    public function forceDelete(User $user, Product $product): bool
    {
        // Solo i manager possono eliminare definitivamente i prodotti
        return $user->isManager();
    }
}