<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ResourcesController extends Controller
{
    public function __invoke(Request $request)
    {
        $type = $request->get('type');
        $lesson = $request->get('lesson');
        $resources = Resource::query()->whereHas('lesson', function ($query) use ($lesson){
            $query->when($lesson, function ($query) use ($lesson) {
                $query->where('id', $lesson);
            });
        })->when($type, function ($query) use ($type) {
            $query->where('type', $type);
        })->paginate(12);

//        ->whereHas('trip', function($query) use ($tripStatus) {
//        $query->when($tripStatus, function ($query) use ($tripStatus) {
//            $query->whereIn('status', $tripStatus);
//        });


        return Inertia::render('Resources', [
            'resources' => $resources,
        ]);
    }
}
