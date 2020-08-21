<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionType;

class QuestionTypeController extends Controller
{
    public function index()
    {
        //
    }

    public function all()
    {
        return response()->json(QuestionType::all(), 200);
    }

    public function store(Reqesut $request)
    {
        $type = QuestionType::create([
            'type'      => $request->type
        ]);

        return response()->json([
            'status'        => $ttype,
            'message'       => $type ? 'Success Created Question Type' : 'Error Creating Question Type'
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
