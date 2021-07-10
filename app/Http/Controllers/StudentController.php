<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Models\User;
use DataTables;
use Auth;

class StudentController extends Controller
{
    //GET ALL STUDENTS
    public function studentsList(){
        // $students = DB::table('users')->get();
        // $students = User::select('id','firstname','gender','email');
        // $students = User::all();
        $students = DB::table('users')->where('role', '2')->get();
        // return DataTables::of($students)->make(true);
        // return DataTables::of($students)->make(true);
        return Datatables::of($students)
                            ->addIndexColumn()
                            ->addColumn('actions', function($row){
                                return '<div>
                                            <button data-id="'.$row->id.'" data-toggle="tooltip" data-placement="bottom" title="View Student" id="viewStudentBtn"><i class="material-icons text-info mr-2">visibility</i></button>
                                            <button data-toggle="tooltip" data-placement="bottom" title="Delete Student"><i class="material-icons text-danger" >delete</i></button>
                                        </div>';
                            }) 
                            ->rawColumns(['actions'])
                            ->make(true);

    }

    //GET STUDENT DETAILS
    public function studentDetails(Request $request){


        $studentid = $request->id;

        // $studentDetails = User::where('id', $studentid);
        // $studentDetails = User::find($studentid);
        $studentDetails = User::find($studentid);
       
        // $studentDetails = DB::table('users')->where('id' -> $studentid);
        
        // $studentDetails = User::find($request->id);
                // dd($studentid);
        // dd($studentDetails);


        return response()->json([
            'details' => $studentDetails
        ]);

        // return back()->json($studentid);
    }
}
