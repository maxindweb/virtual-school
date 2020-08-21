<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Courses;
use Validator;

class QuestionController extends Controller
{
    public function all()
    {
        return response()->json(Question::where('courses_id', '=', $courses->id)->first(),200);
    }

    public function store()
    {
        //
    }

    public function show()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        // 
    }
}
