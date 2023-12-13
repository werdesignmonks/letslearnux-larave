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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar_path' => $request->hasFile('profile_image') ? $request->file('profile_image')->store('images') : null, // Image upload (if any
            'password' => bcrypt($request->password)
        ]);

        if ($request->avatar_path) {
            $user->addMedia($request->avatar_path)->toMediaCollection();
        }

        //Redirect to the index page
        return redirect()->route('user.index')->with('message', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return Inertia::render('Admin/User/Show', [
            'user' => $user,
        ]);
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
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'avatar_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'password' => "nullable|string|between:5,16"
            ]);

            //Update the user
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'avatar_path' => $request->hasFile('avatar_path') ? $request->file('avatar_path')->store('images') : null, // Image upload (if any
                'password' => bcrypt($request->password)
            ]);


        if ($request->hasFile('avatar_path')) {
            $user->media()->delete();
            $user->addMedia($request->avatar_path)->toMediaCollection();
        }

//        if ($request->hasFile('profile_image')) {
//            $user->clearMediaCollection('default');
//            $user->addMedia($request->profile_image)->toMediaCollection('default');
//        }

            //Redirect to the index page
            return redirect()->route('user.index')->with('message', 'User updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('message', 'User deleted successfully');
    }
}
