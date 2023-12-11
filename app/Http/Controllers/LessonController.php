<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::with('chapter')->orderBy('id', 'desc')->paginate(5);

        return Inertia::render('Admin/Lesson/Index', [
            'lessons' => $lessons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //Chapter
        $chapters = Chapter::all();

        return Inertia::render('Admin/Lesson/Create', [
            'chapters' => $chapters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the data
        $request->validate([
            'topic_name' => 'required|max:255|unique:topics',
            'chapter_id' => 'required',
            'short_description' => 'required',
        ]);

        //Store the data
        $topic = Lesson::create([
            'name' => $request->title,
            'chapter_id' => $request->chapter_id,
            'description' => $request->description,
        ]);

        // Redirect to the index page
        return redirect()->back()->with('message', 'Lesson created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        $chapters = Chapter::all();

        return Inertia::render('Admin/Lesson/Edit', [
            'lesson' => $lesson,
            'chapters' => $chapters
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        // Validate the data
        $validated = $request->validate([
            'title' => 'required|max:255|unique:topics,topic_name,' . $lesson->id,
            'chapter_id' => 'required',
            'description' => 'required',
        ]);

        //Store the data
        $lesson->update($validated);

        // Redirect to the index page
        return redirect()->route('lesson.index')->with('message', 'Lesson updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
