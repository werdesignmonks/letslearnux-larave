<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Resource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoadmapController extends Controller
{
    public function index()
    {

        $chapers = Chapter::with('lesson')->orderBy('id', 'desc')->paginate(5);

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

//    Add Resource to Lesson
    public function addResource(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'lesson_id' => 'required',
            'title' => 'required',
            'url' => 'required',
            'type' => 'required',
        ]);

        $resource = Resource::create([
            'user_id' => auth()->user()->id,
            'lesson_id' => $request->lesson_id, // Get lesson id from the form (hidden field
            'title' => $request->title,
            'url' => $request->url,
            'type' => $request->type,
        ]);

        return redirect()->back()->with('success', 'Resource Added Successfully');
    }
}
