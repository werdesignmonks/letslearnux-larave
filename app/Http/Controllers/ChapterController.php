<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapers = Chapter::all();
        return Inertia::render('Admin/Chapter/Index', [
            'chapters' => $chapers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return Inertia::render('Admin/Chapter/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the data
        $request->validate([
            'custom_sl' => 'required|numeric',
            'chapter_name' => 'required|max:255|unique:chapters',
            'title' => 'required|max:255|unique:chapters',
            'sub_title' => 'required|max:255',
            'estimate_time' => 'required',
        ]);

        //Store the data
        $chapter = Chapter::create([
            'custom_sl' => $request->custom_sl,
            'chapter_name' => $request->chapter_name,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'estimate_time' => $request->estimate_time,
            'slug' => Str::slug($request->title),
        ]);

        //Redirect to the index page
        return redirect()->route('chapter.index')->with('message', 'Chapter created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        return Inertia::render('Admin/Chapter/Edit', [
            'chapter' => $chapter
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        // Validate the data
        $validated = $request->validate([
            'custom_sl' => 'required|numeric',
            'chapter_name' => 'required|max:255|unique:chapters,chapter_name,' . $chapter->id,
            'title' => 'required|max:255|unique:chapters,title,' . $chapter->id,
            'sub_title' => 'required|max:255',
            'estimate_time' => 'required',
        ]);

        //Store the data
        $chapter->update($validated);

        //Redirect to the index page
        return redirect()->route('chapter.index')->with('message', 'Chapter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return redirect()->route('chapter.index')->with('message', 'Chapter deleted successfully');
    }
}
