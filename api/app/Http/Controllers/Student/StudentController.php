<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\Student;
use Illuminate\Support\Facades\Log;
class StudentController extends Controller
{
    public function index(){
        $students = Student::with("profile", "studentBag", "notification")->get();
        return response()->json(['students' => $students]);
    }

    public function store(Request $request){  

        $validator = Validator::make($request->all(), [
            'studentId'=>'required',
            'password'=>'required|min:8|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validation Failed',
                'errors'=>$validator->errors()
            ],422);
        }

        $student = Student::create([
            'studentId'=>$request->studentId,
            'password'=>Hash::make($request->password)
        ]);

        $student -> profile()->create($request->input('profile'));
        $student->notification()->create(['stu_id' => $student->studentId]);
        $student->studentBag()->create(['stu_id' => $student->studentId]);
        
        return response()->json([
            'message'=> 'Student Added',
            'data'=>$student
            ],200);

        
     }

     public function show($id){
        $student = Student::with(["profile", "studentBag", "notification"])->find($id);
        if(!$student){
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json(['student' => $student]);
    } 

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|max:100',
            'confirm_password' => 'required|same:password',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $student = Student::find($id);
    
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }
    
        $student->password = Hash::make($request->password);
        $student->save();
    
        return response()->json([
            'message' => 'Password updated successfully',
            'data' => $student
        ], 200);
    }
     public function destroy($id){
        $student = Student::find($id);
        $student -> delete();
        $student -> profile()->delete();
        $student -> studentBag()->delete();
        $student -> notification()->delete();
        return response()-> json(['message' => 'Student Removed']);
     }

    public function login(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'studentId' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation Failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $credentials = $request->only('studentId', 'password');

            if (Auth::attempt($credentials)) {
                $student = Auth::user();
                $token = $student->createToken('StudentToken')->plainTextToken;
                
                return response()->json([
                    'message' => 'Login successful',
                    'data' => [
                        'student' => $student,
                        'token' => $token
                    ]
                ], 200);
            } else {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        }      
    
}

 /* if ($request->filled('upperUniform') && is_array($request->upperUniform)) {
            $upperUniformData = $request->input('upperUniform');
            $upperUniformData['stu_id'] = $student->studentId;
            $student->upperUniform()->create($upperUniformData);
        }
        if ($request->filled('lowerUniform') && is_array($request->lowerrUniform)) {
            $lowerUniformData = $request->input('lowerUniform');
            $lowerUniformData['stu_id'] = $student->studentId;
            $student->lowerUniform()->create($lowerUniformData);
        }
        if ($request->filled('rso') && is_array($request->rso)) {
            $rsoData = $request->input('rso');
            $rsoData['stu_id'] = $student->studentId;
            $student->rso()->create($rsoData);
        }*/
       // 
        