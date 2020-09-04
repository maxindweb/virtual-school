<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoursesCategory;
use Validator;
use Carbon;

class CoursesCategoryController extends Controller
{
    public function index()
    {
        return response()->json(CoursesCategory::all(), 200);
    }

    public function show(CoursesCategory $category)
    {
        return response()->json($category);
    }

    /**
     * stored category
     * @param Request
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category'  => 'required|'
        ]);

        if($validator->fails()){
            return response()->json([
                'error'     => $validator->error()
            ]);
        }

        $category  = CoursesCategory::create([

            'category'     => $request->category
        ]);

        return response()->json([
            'data'  => $category,
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
