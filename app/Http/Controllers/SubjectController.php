<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Professor;
use Validator, Input, Redirect;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Response;
use DataTables;
use Auth;

class SubjectController extends Controller
{
    //
    public function subjects(){
        // $courses = Course::with('subjects')->get();

        // return view('dashboards.admins.subjects', compact('courses'));

        // $courses = Course::with('subjects')->first();
        // $subject = Subject::first();

        // $courses->subjects()->attach($subject);
        // dd($subject);
        // return;
        $courses = Course::with('subjects')->latest()->get();
        $professors = Professor::with('subjects')->get();

        return view('dashboards.admins.subjects', compact('courses' , 'professors'));
    }

    // Add subject
    public function addSubject(Request $request){
        $validator = Validator::make($request->all(),[
            'subject_abbreviation'=> 'required|string|max:10',
            'subject_title'=> 'required',
            'subject_unit'=> 'required',
            'subject_description'=> 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);

        }else{

            $course_id = $request->get("course_id");
            $course = Course::with('subjects')->where('id', $course_id)->first();
            
            $subject = new Subject;
            $subject->subject_abbreviation = $request->subject_abbreviation;
            $subject->subject_title = $request->subject_title;
            $subject->subject_unit = $request->subject_unit;
            $subject->subject_description = $request->subject_description;

            $subject->save();
        
            $query = $course->subjects()->attach($subject->id);

            if($query){
                return response()->json(['code'=>0, 'msg'=> 'Something went wrong, Please try again']);
            }else{
                return response()->json(['code'=>1, 'msg'=> 'New Subject has been successfully saved']);
            };

        }
    }

    //  Get subject Details
    public function subjectDetails(Request $request){
        $subjectid = $request->id;
        $subjectDetails= Subject::find($subjectid);
        return response()->json(['details'=>$subjectDetails]);
    }

    // Update Subject Details
    public function updateSubjectDetails(Request $request){

        $validator = Validator::make($request->all(),[
            'subject_abbreviation'=> 'required|string',
            'subject_title'=> 'required|string',
            'subject_unit'=> 'required',
            'subject_description'=> 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{


            $professor_id = $request->get("professor");
            $professors = Professor::with('subjects')->where('id', $professor_id)->first();

            $day_of_week = $request->get('day_of_week');

            $subject = Subject::find($request->cid);
            $subject->subject_abbreviation = $request->subject_abbreviation;
            $subject->subject_title = $request->subject_title;
            $subject->subject_unit = $request->subject_unit;
            $subject->subject_description = $request->subject_description;

            $subject->day_of_week  = $request->day_of_week ;
            $subject->start_time = $request->start_time;
            $subject->end_time = $request->end_time;

            $professors->subjects()->attach($subject);

            $query = $subject->save();

            // $query = $professors->subjects()->attach($subject->id);

            
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Subject details have been updated.']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong, Please try again.']);
            }
        }
    }

        // Delete professor
        public function deleteSubjectDetails(Request $request){
            $subjectid = $request->id;
            $query = Subject::find($subjectid)->delete();


    
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Subject has been deleted from database']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong, Please try again.']);
            }
        }
}
