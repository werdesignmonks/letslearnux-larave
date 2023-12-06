<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Topic/Index', [
            // Order By Descending , Latest Chapter will show first Paginate(10) means 10 data per page
            'topics' => Topic::orderBy('id', 'DESC')->paginate(10)->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Chapter
        $chapters = Chapter::all();

        return Inertia::render('Admin/Topic/Create', [
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
        $topic = Topic::create([
            'topic_name' => $request->topic_name,
            'chapter_id' => $request->chapter_id,
            'short_description' => $request->short_description,
        ]);

        // Redirect to the index page
        return redirect()->back()->with('message', 'Topic created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //Chapter
        $chapters = Chapter::all();

        return Inertia::render('Admin/Topic/Edit', [
            'topic' => $topic,
            'chapters' => $chapters
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        // Validate the data
        $validated = $request->validate([
            'topic_name' => 'required|max:255|unique:topics,topic_name,' . $topic->id,
            'chapter_id' => 'required',
            'short_description' => 'required',
        ]);

        //Store the data
        $topic->update($validated);

        // Redirect to the index page
        return redirect()->route('topic.index')->with('message', 'Topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect()->route('topic.index')->with('message', 'Topic deleted successfully');
    }
}
