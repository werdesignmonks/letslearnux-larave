<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\LearnStatus;
use App\Models\Lesson;
use App\Models\Like;
use App\Models\Resource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoadmapController extends Controller
{
    public function index(Request $request, Lesson $lesson)
    {

        $shortBy = $request->get('sort');
        $allChapters = Chapter::all();
        $lessonStatus = LearnStatus::where('user_id', auth()->user()->id)->get();

//        dd($lessonStatus);

        $chapers = Chapter::with('lesson')->orderBy('id', 'asc')
            ->when($shortBy, function ($query, $shortBy) {
                return $query->where('id', $shortBy);
            })
            ->with('learnStatus')
            ->paginate(10);

        return Inertia::render('Roadmap', [
            'chapters' => $chapers,
            'allChapters' => $allChapters,
            'lessonStatus' => $lessonStatus,
        ]);
    }

    // Show lesson with slug
    public function show($slug)
    {
        $lesson = Lesson::query()->where('slug', $slug)->withLikes()->firstOrFail();
        $book_resource = Resource::query()->where('lesson_id', $lesson->id)->where('type', Resource::TYPE_BOOK)->where('status', 'approved')->get();
        $article_resource = Resource::query()->where('lesson_id', $lesson->id)->where('type', Resource::TYPE_ARTICLE)->where('status', 'approved')->get();
        $video_resource = Resource::query()->where('lesson_id', $lesson->id)->where('type', Resource::TYPE_VIDEO)->where('status', 'approved')->get();
        $lessonStatus = LearnStatus::query()->where('user_id', auth()->user()->id)->where('lesson_id', $lesson->id)->first();
        $liked = Like::query()->where('user_id', auth()->user()->id)->where('lesson_id', $lesson->id)->first();


        $user = auth()->user();

        return Inertia::render('ChapterSingle', [
            'lesson' => $lesson,
            'book_resource' => $book_resource,
            'article_resource' => $article_resource,
            'video_resource' => $video_resource,
            'user' => $user,
            'learnStatus' => $lessonStatus,
            'liked' => $liked,
        ]);
    }

//    Add Resource to Lesson
    public function addResource(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'lesson_id' => 'required',
            'title' => 'required',
            'url' => 'required',
            'type' => 'required',
        ]);

        $resource = Resource::create([
            'user_id' => auth()->user()->id,
            'lesson_id' => $request->lesson_id, // Get lesson id from the form (hidden field
            'title' => $request->title,
            'url' => $request->url,
            'type' => $request->type,
            'status' => 'draft',
        ]);

        if($request->image){
            $resource->addMedia($request->image)->toMediaCollection();
        }

        return redirect()->back()->with('success', 'Resource Added Successfully');
    }
}
