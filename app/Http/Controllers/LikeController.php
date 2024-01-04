<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    function like(Request $request)
    {
        $lesson = Lesson::find($request->lesson_id);
        $lesson->like(auth()->user());

        // Feedback removal from like table
        $lesson->feedback(null);

        return back();
    }

    function dislike(Request $request)
    {
        $lesson = Lesson::find($request->lesson_id);
        $lesson->dislike();

        // Feedback creation to like table
        $lesson->feedback($request->feedback);

        return back();
    }
}
