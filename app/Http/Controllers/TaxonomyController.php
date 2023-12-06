<?php

namespace App\Http\Controllers;

use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaxonomyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Taxonomy/Index', [
            'taxonomies' => Taxonomy::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Taxonomy/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content_type' => 'required',
            'taxonomy_name' => 'required|max:255|unique:taxonomies',
            'taxonomy_slug' => 'required|max:255|unique:taxonomies',
            'file' => 'nullable',
            'link' => 'nullable',
        ]);

        $taxonomy = Taxonomy::create([
            'content_type' => $request->content_type,
            'taxonomy_name' => $request->taxonomy_name,
            'taxonomy_slug' => $request->taxonomy_slug,
            'file' => $request->file,
            'link' => $request->link,
        ]);

        return redirect()->route('taxonomy.index')->with('message', 'Taxonomy created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Taxonomy $taxonomy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taxonomy $taxonomy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taxonomy $taxonomy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taxonomy $taxonomy)
    {
        //
    }
}
