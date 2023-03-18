<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ManagementAccess\Role;
use App\Models\TypeUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $user = User::orderBy('created_at', 'desc')->get();
        $roles = Role::all()->pluck('title', 'id');
        return view('pages.backsite.user.index', compact('user', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
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
        // get validation name, email, username, role, type_user_id
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'username' => 'required|unique:users,username,'.$id,
            'role' => 'required',
            'type_user_id' => 'required',
        ]);

        // get all request from frontsite
        // create new user
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->type_user_id = $request->type_user_id;
        // hash password
        // if password null then password not change
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        // store database
        $user->save();
        // sync roel by users select
        $user->role()->sync($request->input('role', []));

        $user->save();
        alert()->success('Success','Successfully updated user');
        return redirect()->route('user.index');
        
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
    // create function account setting
    public function settingAccount()
    {
        $user = auth()->user();
        return view('pages.backsite.user.setting-account', compact('user'));
    }
    // create function update account setting
    public function updateSettingAccount(Request $request)
    {
        // get validation name, email, username, role, type_user_id
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|min:8|confirmed',
        ]);

        // get all request from frontsite
        // create new user
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->profile_photo_path = $request['profile_photo_path'];
        // upload image
        $user['profile_photo_path'] = isset($user['profile_photo_path']) ? $request->file('profile_photo_path')->store('assets/photo-user', 'public') : "";
        // hash password
        // current password and new password, but if new password null then password not change
        if($request->password != null){
            if(Hash::check($request->current_password, $user->password)){
                $user->password = Hash::make($request->password);
            }else{
                alert()->error('Error','Current password not match');
                return back();
            }
        }
        // store database
        $user->save();
        alert()->success('Success','Successfully updated user');
        return redirect()->route('user.index');
    }
}
