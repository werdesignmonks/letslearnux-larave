<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Onboarding;
use App\Models\OnboardingQuestion;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OnboadingFormController extends Controller
{
    public function index()
    {
        $onboardings = OnboardingQuestion::all();
        return Inertia::render('Onboarding', [
            'onboardings' => $onboardings,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'options' => 'required',
        ]);

        $onboarding = Onboarding::create([
            'name' => $request->name,
        ]);

        foreach ($request->options as $option) {
            $onboarding->options()->create([
                'name' => $option['name'],
            ]);
        }

        return redirect()->back()->with('success', 'Onboarding created successfully.');
    }

    public function save(Request $request)
    {

//        dd($request->profession);
//

        $request->validate([
            'profession' => 'required|string',
            'experience' => 'required|string',
            'learning' => 'required|array',
        ]);

       OnboardingQuestion::create([
            'profession' => $request->profession,
            'experience' => $request->experience,
            'learning' => json_encode($request->learning),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('roadmap')->with('success', 'Onboarding created successfully.');
    }
}
