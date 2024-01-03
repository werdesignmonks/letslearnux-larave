<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    function like(Request $request)
    {
        $lesson = Lesson::find($request->lesson_id);
        $lesson->like(auth()->user());

        return back();
    }

    function dislike(Request $request)
    {
        $lesson = Lesson::find($request->lesson_id);
        $lesson->dislike();
        return back();
    }
}
