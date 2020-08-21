<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses;
use Validator;

class CoursesController extends Controller
{
    public function index()
    {
        return response()->json(Courses::all(), 200);
    }

    public function TeacherScope()
    {
        //
    }

    public function userScope()
    {
        
    }

    public function UploadThumbnail(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:jpg,png,webp,|size:5000'
        ]);

        if($validator->fails()){
            return reponse()->json([
                'error' => $validator->erros()
            ]);

            if($request->hasFile('image')){

                $image = $request->file('image');

                if(is_null($name)){
                     $name = time(). "_" . rand(1000, 1000000) . "." . $image->getClientOriginalExtension();
                }

                $image->move(public_path('image'), $name);

                return '/images/'.$name;
            }
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'title'         => 'required|max:255',
            'description'   => 'max:255'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->error()
            ]);
        }

        $Courses = Courses::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'thumbnail'     => $this->uploadThumbnail()
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
