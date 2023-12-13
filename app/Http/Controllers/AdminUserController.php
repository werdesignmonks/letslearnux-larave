<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUserRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return Inertia::render('Admin/User/Index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/User/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminUserRequest $request)
    {

        //Create a new user
        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'profile_image' => $request->hasFile('profile_image') ? $request->file('profile_image')->store('images') : null, // Image upload (if any
            'password' => bcrypt($request->password)
        ]);

        if ($request->profile_image) {
            $user->addMedia($request->profile_image)->toMediaCollection();
        }

        //Redirect to the index page
        return redirect()->route('users.index')->with('message', 'User created successfully');
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
    public function edit(User $user)
    {
        return Inertia::render('Admin/User/Edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
//        dd($request->all());

            $request->validate([
                'name' => 'required|max:255',
                'email' => ['required', 'email', Rule::unique('admins')->ignore($user->id)],
                'avater_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'password' => "nullable|string|between:5,16"
            ]);

            //Update the user
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'avater_path' => $request->hasFile('profile_image') ? $request->file('profile_image')->store('images') : null, // Image upload (if any
                'password' => bcrypt($request->password)
            ]);


        if ($request->hasFile('avater_path')) {
            $user->media()->delete();
            $user->addMedia($request->profile_image)->toMediaCollection();
        }

//        if ($request->hasFile('profile_image')) {
//            $user->clearMediaCollection('default');
//            $user->addMedia($request->profile_image)->toMediaCollection('default');
//        }

            //Redirect to the index page
            return redirect()->route('users.index')->with('message', 'User updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $user)
    {

        $user->delete();

        return redirect()->route('users.index')->with('message', 'User deleted successfully');
    }
}
