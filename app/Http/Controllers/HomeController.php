<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $roles = Role::all();

            // dd($roles);

    return view('admin.roles.index', compact('roles'));
}
        else {
            return view('user');
        }

    // return view('admin.roles.index', compact('roles'));

        // get all roles from database
        // $roles = \App\Models\Role::all();

        // return view('admin.roles.form', [
        //     'roles' => $roles
        // ]);
    }


        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.form', [
            'role' => new Role()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.form', [
            'role' => $role
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
    //
}
