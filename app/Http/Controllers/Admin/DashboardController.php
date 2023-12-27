<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('admin.redirect');
//    }

    public function index()
    {

        // Resources user has created users count
        $createdResources = User::query()->withCount('resource')->get();

        // Total number of users count
        $usersCount = User::query()->count();



        // All Resources
        $resources = Resource::all();

        // Query draft Resources
        $draftResources = Resource::query()->with('user')->where('status', 'draft')->paginate(10);

        // Resources user has created
//        $userResources = Resource::query()->where('user_id', auth()->user()->id)->get();

        return Inertia::render('Admin/Dashboard', [
            'resources' => $resources,
            'users' => $usersCount,
            'draftResources' => $draftResources,
            'userResources' => $createdResources,
        ]);
    }
}
