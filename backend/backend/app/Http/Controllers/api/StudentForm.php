<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentInfo;
use Illuminate\Support\Facades\Validator;

class StudentForm extends Controller
{
    public function createStudent(Request $request){
        $validation = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'citizenship' => 'required',
            'country_of_residence' => 'required'
        ]);
        if($validation->fails()){
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validation->errors()
            ]);
        }

        $student = new StudentInfo();
        $student->fullname = $request->fullname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->citizenship = $request->citizenship;
        $student->country_of_residence = $request->country_of_residence;
        $student->save();
        return response()->json([
            'message' => 'Student created successfully'
        ]);
    }
}
