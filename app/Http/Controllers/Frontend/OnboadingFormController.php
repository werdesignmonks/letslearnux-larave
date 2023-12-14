<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Onboarding;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OnboadingFormController extends Controller
{
    public function index()
    {
        $onboardings = Onboarding::with('options')->orderBy('id', 'desc')->get();
        return Inertia::render('Onboarding', [
            'onboardings' => $onboardings,
        ]);
    }
}
