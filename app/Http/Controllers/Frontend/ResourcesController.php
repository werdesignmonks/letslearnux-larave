<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Resource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ResourcesController extends Controller
{
    public function __invoke(Request $request)
    {
        $lessonIds = $request->get('lesson_ids');
        $resourceTypes = $request->get('types');

        $resources = Resource::query()->when($lessonIds, function ($query) use ($lessonIds) {
            $query->whereIn('lesson_id', $lessonIds);
        })->when($resourceTypes, function ($query) use ($resourceTypes) {
            $query->whereIn('type', $resourceTypes);
        })->paginate(12);

        $lessons = Lesson::all();

        return Inertia::render('Resources', [
            'resources' => $resources,
            'lessons' => $lessons,
            'selectedLessonIds' => $lessonIds,
            'selectedResourceTypes' => $resourceTypes,
        ]);
    }
}
