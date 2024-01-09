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
        $lessonIds = $request->get('lesson');
        $resourceType = $request->get('type');
        $shot = $request->get('sort') === 'asc';

        if ($lessonIds) {
            $lessonIds = explode(',', $lessonIds);
        }

        $resources = Resource::query()
            ->orderBy('title', $shot ? 'asc' : 'desc')
            ->when($resourceType, function ($query, $resourceType) {
                return $query->where('type', $resourceType);
            })
            ->when($lessonIds, function ($query, $lessonIds) {
                return $query->whereIn('lesson_id', $lessonIds);
            })
            ->where('status', 'approved')
            ->paginate(12);

        $lessons = Lesson::query()->orderBy('id', 'desc')->get();

        return Inertia::render('Resources', [
            'resources' => $resources,
            'lessons' => $lessons,
            'selectedLessonIds' => $lessonIds,
            'selectedResourceTypes' => $resourceType,
        ]);
    }

    public function myContribution(Request $request) {

        $resourceType = $request->get('type');
        $shot = $request->get('sort') === 'asc';

        $resources = Resource::query()
            ->where('user_id', auth()->user()->id)
            ->orderBy('title', $shot ? 'asc' : 'desc')
            ->when($resourceType, function ($query, $resourceType) {
                return $query->where('type', $resourceType);
            })

            ->paginate(12);

        return Inertia::render('MyContribution', [
            'resources' => $resources,
        ]);
    }
}
