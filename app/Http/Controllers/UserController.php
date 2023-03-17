<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ManagementAccess\Role;
use App\Models\TypeUser;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at', 'desc')->get();
        $roles = Role::all()->pluck('title', 'id');
        return view('pages.backsite.user.index', compact('user', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all()->pluck('title', 'id');
        $type_users = TypeUser::all();
        return view('pages.backsite.user.create', compact('roles', 'type_users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // create validation email and username no space
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'role' => 'required',
        ]);
        // get all request from frontsite
        // create new user
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->type_user_id = $request->type_user_id;
        // hash password
        $user->password = Hash::make($request->email);
        // store database
        $user->save();
        // sync roel by users select
        $user->role()->sync($request->input('role', []));

        $user->save();
        alert()->success('Success','Successfully added new user');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('title', 'id');
        $type_users = TypeUser::all();
        return view('pages.backsite.user.edit', compact('user', 'roles', 'type_users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        alert()->success('Success', 'Successfully deleted user');
        return back();
    }
}
