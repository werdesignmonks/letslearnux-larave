<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ResourcesController extends Controller
{
    public function index(Request $request)
    {
        $lessonIds = $request->get('lesson_ids');
        $resourceTypes = $request->get('types');

        $resources = Resource::query()->when($lessonIds, function ($query) use ($lessonIds) {
            $query->whereIn('lesson_id', $lessonIds);
        })->when($resourceTypes, function ($query) use ($resourceTypes) {
            $query->whereIn('type', $resourceTypes);
        })->where('status', 'approved')->paginate(12);

        $lessons = Lesson::all();

        return Inertia::render('Resources', [
            'resources' => $resources,
            'lessons' => $lessons,
            'selectedLessonIds' => $lessonIds,
            'selectedResourceTypes' => $resourceTypes,
        ]);
    }

    public function myContribution() {

        $resources = Resource::query()->where('user_id', auth()->user()->id)->paginate(12);

        return Inertia::render('MyContribution', [
            'resources' => $resources,
        ]);
    }
}
