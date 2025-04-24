<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:manager');
    }

    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();
        
        return view('admin.roles.index', compact('users', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Ruoli aggiornati con successo!');
    }
}
