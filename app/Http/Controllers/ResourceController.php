<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Resource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request )
    {
        $resources = Resource::with( ['user', 'lesson'] )->orderBy( 'id', 'desc' )->paginate( 5 );

        return Inertia::render( 'Admin/Resource/Index', [
            'resources' => $resources,
        ] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lessons = Lesson::all();

        return Inertia::render( 'Admin/Resource/Create', [
            'lessons' => $lessons,
        ] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $resource = Resource::create([
            'title' => $request->title,
            'type' => $request->type,
            'url' => $request->url,
            'user_id' => auth()->user()->id,
            'lesson_id' => $request->lesson_id,
            'status' => $request->status,
            'image' => $request->hasFile('image') ? $request->file('image')->store('images') : null, // Image upload (if any
        ]);

        if($request->image){
            $resource->addMedia($request->image)->toMediaCollection();
        }

        // Redirect to the index page
        return redirect()->route('resource.index')->with('message', 'Resource created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        $lessons = Lesson::all();

        return Inertia::render('Admin/Resource/Edit', [
            'resource' => $resource,
            'lessons' => $lessons
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {

        $resource->update([
            'title' => $request->title,
            'type' => $request->type,
            'url' => $request->url,
            'user_id' => auth()->user()->id,
            'status' => $request->status,
            'image' => $request->hasFile('image') ? $request->file('image')->store('images') : null, // Image upload (if any
        ]);

        if($request->hasFile('image')){
            $resource->media()->delete();
            $resource->addMedia($request->image)->toMediaCollection();
        }

        // Redirect to the index page
        return redirect()->route('resource.index')->with('message', 'Resource updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->back()->with('message', 'Resource deleted successfully');
    }
}
