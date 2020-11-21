<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkSuperAdmin');
    }


    public function index()
    {
        $users =User::paginate(5);
        return view('admin.users.index',compact('users'));
    }


    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles'=>$roles
        ]);
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        //pass in the new name and email from request and save it
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();


        return redirect()->route('users.index')->with('success','You had updated the users!');
    }


    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('users.index')->with('success','You had deleted the users!');
    }
}
