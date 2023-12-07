<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUserRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Admin::all();

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
//        $validated = $request->validate([
//            'name' => 'required|max:255',
//            'email' => 'required|email|unique:admins',
//            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
//            'password' => 'required|min:8',
//        ]);

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
    public function edit(Admin $user)
    {
        return Inertia::render('Admin/User/Edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $user)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email,' . $user->id,
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'password' => 'required|min:8',
        ]);

        $user->update($validated);

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
