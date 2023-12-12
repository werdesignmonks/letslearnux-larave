<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    function index()
    {
        return view('option');
    }

    function store(Request $request)
    {
        $request->validate([
            'onboarding_id' => 'required',
            'title' => 'required',
        ]);

        $option = new Option();
        $option->onboarding_id = $request->onboarding_id;
        $option->title = $request->title;
        $option->save();

        return redirect()->route('option.index')->with('message', 'Option created successfully');
    }

    function edit($id)
    {
        $option = Option::findOrFail($id);
        return view('option-edit', compact('option'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'onboarding_id' => 'required',
            'title' => 'required',
        ]);

        $option = Option::findOrFail($id);
        $option->onboarding_id = $request->onboarding_id;
        $option->title = $request->title;
        $option->save();

        return redirect()->route('option.index')->with('message', 'Option updated successfully');
    }

    function destroy($id)
    {
        $option = Option::findOrFail($id);
        $option->delete();

        return redirect()->route('option.index')->with('message', 'Option deleted successfully');
    }
}
