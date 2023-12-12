<?php

namespace App\Http\Controllers;

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
        $resources = Resource::with( 'admin' )->orderBy( 'id', 'desc' )->paginate( 5 );
        return Inertia::render( 'Admin/Resource/Index', [
            'resources' => $resources,
        ] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Resource/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        dd($request->all());

        // Validate the data
        $validate =$request->validate([
            'title' => 'required|max:255',
            'type' => 'required',
            'url' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        // Array merge with user id
        $validate = array_merge($validate, ['user_id' => auth()->user()->id]);


        //Store the data
        $resource = Resource::create($validate);

        // Redirect to the index page
        return redirect()->back()->with('message', 'Resource created successfully');

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
        return Inertia::render('Admin/Resource/Edit', [
            'resource' => $resource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        // Validate the data
        $validate =$request->validate([
            'title' => 'required|max:255' . $resource->id,
            'type' => 'required',
            'url' => 'required',
            'status' => 'required',
            'image' => 'required'   ,
        ]);

        // Array merge with user id
        $validate = array_merge($validate, ['user_id' => auth()->user()->id]);

        //Store the data
        $resource->update($validate);

        // Redirect to the index page
        return redirect()->back()->with('message', 'Resource updated successfully');
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
