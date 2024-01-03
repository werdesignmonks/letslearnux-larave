<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonStatusController extends Controller
{
    public function complete(Request $request)
    {
        $lesson = Lesson::find($request->lesson_id);
        $lesson->statusComplete(auth()->user());

        // Calculate percentage of chapter
        $chapter = $lesson->chapter;
        $chapter->calculatePercentage();

        return back();
    }

    public function unComplete(Request $request)
    {
        $lesson = Lesson::find($request->lesson_id);
        $lesson->statusUnComplete(auth()->user());

        return back();
    }
}
