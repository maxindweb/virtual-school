<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\AssigmentSubmited;
use App\Assigment;

class AssigmentSubmitedController extends Controller
{
    public function show(AssigmentSubmited $assigmentsumited)
    {
        return response()->json($assigmentsumited, 200);
    }

    public function store()
    {
        $submited = AssigmentSubmiter::create([
            'file'          => $this->uploadFile(),
            'assigment_id'  => $request->assigment_id,
            'user_id'       => $request->user_id,
            'submited_at'   => Carbon::now()
        ]);

        return response()->json([
            'status'    => (bool)$submited,
            'data'      => $submited,
            'message'   => $submited ? 'Success Submited Assigment' : 'error Submited Assigment'
        ]);
    }

    public function uploadFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            ''
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $submited = find($id);
        $submited->file = $this->uploadFile($request);
        $submited->submited_at = Carbon::now();
        $submited->save();

        return response()->json([
            'data' => $submited,
        ]);
    }

    public function destroy()
    {
        //
    }
}
