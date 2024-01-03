<?php

namespace App\Http\Controllers;

use App\Models\LearnStatus;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LearnStatusController extends Controller
{
    // Update learn status
    public function store(Request $request)
    {

        $learnStatus = LearnStatus::query()->where('user_id', $request->user_id)->where('lesson_id', $request->lesson_id)->first();

        // Get lesson count in chapter
        $lessonCount = Lesson::query()->where('chapter_id', $request->chapter_id)->count();

        // Calculate progress percentage with is_completed count status
        $progress = LearnStatus::query() ->where('user_id', $request->user_id)->where('chapter_id', $request->chapter_id)->where('is_completed', true)->count();

//        dd($progress);

        $progress += 1;
        $progress = ($progress / $lessonCount) * 100;


        // Merge progress to request
        $request->merge([
            'progress' => $progress,
        ]);

        // If learn status exists, update it.
        if ($learnStatus) {
            $learnStatus->updateOrCreate($request->all());
        } else {
            LearnStatus::create($request->all());
        }


        // If learn status exists, update it
//
//        if ($learnStatus) {
//            $learnStatus->update([
//                'is_completed' => $request->is_completed,
//                'progress' => $request->progress,
//            ]);
//        } else {
//            LearnStatus::create([
//                'user_id' => $request->user_id,
//                'learn_id' => $request->learn_id,
//                'is_completed' => $request->is_completed,
//                'progress' => $request->progress,
//            ]);
//        }

    }
}
