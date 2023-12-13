<?php

namespace App\Http\Controllers;

use App\Models\Onboarding;
use App\Models\Option;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OnboardingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $onboarding = Onboarding::orderBy('id', 'desc')->get();


        return Inertia::render('Admin/Onboarding/Index', [
            'onboarding' => $onboarding,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Onboarding/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Onboarding $onboarding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Onboarding $onboarding)
    {
        $options = Option::where('onboarding_id', $onboarding->id)->get();

        return Inertia::render('Admin/Onboarding/Edit', [
            'onboarding' => $onboarding,
            'options' => $options,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Onboarding $onboarding)
    {
        $request->validate([
            'title' => 'required|max:255',
            'type' => 'required',
        ]);

        $onboarding->update([
            'title' => $request->title,
            'type' => $request->type,
        ]);

        return redirect()->route('onboarding.index')->with('message', 'Onboarding updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Onboarding $onboarding, Option $option)
    {
        // Delete the data
        $onboarding->delete();


        // Redirect to the index page
        return redirect()->route('onboarding.index')->with('message', 'Onboarding deleted successfully');
    }

    public function destroyOption( Option $option)
    {
        $onboardingId = $option->onboarding_id;
        // Delete the Option
        $option->delete();

        // Redirect to the index page
        return redirect()->route('onboarding.edit', $onboardingId)->with('message', 'Option deleted successfully');
    }
}
