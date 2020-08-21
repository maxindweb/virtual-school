<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illumiate\Support\Carbon;
use App\Assigment;
use App\Courses;
use Validator;

class AssigmentController extends Controller
{
    public function all(Courses $courses)
    {
        return response()->json(Assigment::where('courses_id', '=', $courses->id)
        ->last()->get(), 200);
    }

    public function show(Assigment $assigment)
    {
        return response()->json(Assigment::where('id', '=', $assigment->id)->with('Submited')->get(), 200);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'title'         => 'required|max:255',
            'description'   => 'max:255'
        ]);

        $assigment = Assigment::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'start'         => Carbon::now(),
            'end'           => Carbon::now(),
            'courses_id'    => $request->courses_id
        ]);

        return response()->json([
            'status'    => (bool) $assigment,
            'data'      => $assigment
        ]);
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
