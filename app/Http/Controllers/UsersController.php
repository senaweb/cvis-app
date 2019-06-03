<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = $this->viewData([
            'pageTitle' => "All Users",
            'pageHeading' => "Display all users",
            'users' => User::paginate(15)
        ]);
        return view('dashboard.users.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $viewData = $this->viewData([
            'pageTitle' => $user->fullName,
            'pageHeading' => $user->fullName,
            'user' => $user
        ]);

        return view('dashboard.users.show', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $viewData = $this->viewData([
            'pageTitle' => 'Edit ' . $user->fullName,
            'pageHeading' => 'Edit ' . $user->fullName,
            'user' => $user
        ]);

        return view('dashboard.users.edit', $viewData);
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
        $request->validate($user->updateRules());
        if (!$request->email == $user->email)
            $request->validate(['email' => ['string ', ' email ', ' max: 255 ', ' unique: users ']]);

        $user->update([
            'role_id' => $request->role_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'organization_id' => $request->organization_id,
            'organization_unit' => $request->organization_unit,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);
        // $role = Role::find($request->role_id)->first();
        $user = User::where('email', $request->email)->first();
        $user->syncPermissions($request->input('permissions'));

        return back()->with('success', ' User updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with(' success ', ' User deleted successfully');
    }
}
