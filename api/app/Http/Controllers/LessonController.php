<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;  
use Validator;

class LessonController extends Controller
{
    public function all()
    {
        // return response()->json();
    }

    public function show(Lesson $lesson)
    {
        return response()->json($lesson);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'title'     => 'required'
        ]);

        $lesson = Lesson::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'courses_id'    => $request->courses_id
        ]);

        return response()->json([
            'data'      => $lesson
        ]);
    }
    
    public function update(Request $request)
    {
        //
    }

    public function destroy()
    {
        
    }
}
