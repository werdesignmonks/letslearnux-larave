<?php

namespace App\Http\Controllers;

use App\Models\LearnStatus;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LearnStatusControllerCopy extends Controller
{

    // Get learn status
    public function index(Request $request)
    {
        $learnStatus = LearnStatus::query()->where('user_id', $request->user_id)->where('lesson_id', $request->lesson_id)->first();

        // Get maximum value of Progress Percentage from learn_statuses table
        $maxProgress = LearnStatus::query()->where('user_id', $request->user_id)->max('progress');


        return response()->json([
            'learn_status' => $learnStatus,
            'max_progress' => $maxProgress,
        ]);
    }

    // Update learn status
    public function store(Request $request)
    {

        $learnStatus = LearnStatus::query()->where('user_id', $request->user_id)->where('lesson_id', $request->lesson_id)->first();

        // Get lesson count in chapter
        $lessonCount = Lesson::query()->where('chapter_id', $request->chapter_id)->count();

        // Calculate progress
//        if($lessonCount == 0) {
//            $progress = 0;
//        } else {
//            $progress = ($request->lesson_id / $lessonCount) * 100;
//        }
//        $progress = ($request->lesson_id / $lessonCount) * 100;


        // Calculate progress percentage with is_completed count status with first() method
        $progress = LearnStatus::query()
                ->where('user_id', $request->user_id)
                ->where('chapter_id', $request->chapter_id)
                ->where('lesson_id', $request->lesson_id)
                ->where('is_completed', true)
                ->count() / $lessonCount * 100;


        $request->merge([
            'progress' => $progress,
        ]);

        // If learn status exists, update it.
        if ($learnStatus) {
            $learnStatus->update($request->all());
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
