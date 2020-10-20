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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::paginate(5);
        return view('admin.users.index',compact('users'));
    }

    /**
     *
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users'))
        {
            return redirect()->route('users.index')->with('ErrorMessages','You had no access to this!');
        }
        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles'=>$roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        //pass in the new name and email from request and save it
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();


        return redirect()->route('users.index')->with('Messages','You had updated the users!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users'))
        {
            return redirect()->route('users.index')->with('ErrorMessages','You had no access to this!');
        }
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('users.index')->with('Messages','You had deleted the users!');
    }
}
