<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoadmapController extends Controller
{
    public function index()
    {

        $chapers = Chapter::with('lesson')->orderBy('id', 'desc')->paginate(5);
//        $lessons = Chapter::with('lessons')->get();

        return Inertia::render('Roadmap', [
            'chapters' => $chapers,
        ]);
    }

    // Show lesson with slug
    public function show($slug)
    {
        $lesson = Lesson::where('slug', $slug)->with(['resource', 'chapter'])->firstOrFail();

        return Inertia::render('ChapterSingle', [
            'lesson' => $lesson,
        ]);
    }
}
