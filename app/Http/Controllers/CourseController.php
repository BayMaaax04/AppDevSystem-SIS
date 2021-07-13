<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator, Input, Redirect;
use Illuminate\Validation\Rules\Password;
use App\Models\Course;
use Response;
use DataTables;
use Auth;

class CourseController extends Controller
{
    //
    public function courses(){
        return view('dashboards.admins.courses');
    }
    // Add Courses
    public function addCourse(Request $request){
        $validator = Validator::make($request->all(),[
            'course_abbreviation'=> 'required|unique:courses',
            'course_title'=> 'required|unique:courses'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $course = new Course();
            $course->course_abbreviation = $request->course_abbreviation;
            $course->course_title = $request->course_title;
            $query = $course->save();

            if(!$query){
                return response()->json(['code'=>0, 'msg'=> 'Something went wrong, Please try again']);
            }else{
                return response()->json(['code'=>1, 'msg'=> 'New Course has been successfully saved']);
            };

        }
    }

    // Get All Courses
    public function coursesList(){

        $course = Course::all();
        return Datatables::of($course)
                            ->addIndexColumn()
                            ->addColumn('actions', function($row){
                                return '<div>
                                            <button data-id="'.$row->id.'" data-toggle="tooltip" data-placement="bottom" title="Edit Course" id="editCourseBtn"><i class="material-icons text-warning mr-2">edit</i></button>

                                            <button data-id="'.$row->id.'" data-toggle="tooltip" data-placement="bottom" title="Delete Course" id="deleteCourseBtn"><i class="material-icons text-danger" >delete</i></button>
                                        </div>';
                            }) 
                            ->rawColumns(['actions'])
                            ->make(true);

    }

    // Update Course
    public function updateCourseDetails(Request $request){

        $validator = Validator::make($request->all(),[
            'course_abbreviation'=> 'required|unique:courses,course_abbreviation,'.$request->cid,
            'course_title'=> 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);

        }else{
            $course = Course::find($request->cid);
            $course->course_abbreviation = $request->course_abbreviation;
            $course->course_title = $request->course_title;
            $query = $course->save();
            
    
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Course details have been updated.']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong, Please try again.']);
            }
        }
    }

    // Delete professor
    public function deleteCourseDetails(Request $request){
        $courseid = $request->id;
        $query = Course::find($courseid)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Course has been deleted from database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong, Please try again.']);
        }
    }

    // Get all professor detail
    public function courseDetails(Request $request){
        $courseid = $request->id;
        $courseDetails= Course::find($courseid);
        return response()->json(['details'=>$courseDetails]);
    }
}
