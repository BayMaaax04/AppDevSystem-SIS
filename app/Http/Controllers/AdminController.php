<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Models\User;
use DataTables;
use Auth;

class AdminController extends Controller
{
    function index(){

        // Number of students
        $student = DB::select('SELECT * FROM `users` WHERE role = 2');
        $students = count($student);

        // Number of professors

        // Number of admins
        $admin = DB::select('SELECT * FROM `users` WHERE role = 1');
        $admins = count($admin);

        // $latestusers = 'SELECT * FROM `users` WHERE role = 2 ORDER BY id DESC LIMIT 5';
        $latestusers = DB::select('select * from users where role = 2 order by id desc limit 5');
        // $users = User::orderBy('id', 'desc')->take(5)->get();

        return view('dashboards.admins.index',compact('students', 'admins', 'latestusers'));
    }
    function profile(){
        return view('dashboards.admins.profile');
    }
    function settings(){
        return view('dashboards.admins.settings');
    }
    function students(){
        return view('dashboards.admins.students');
    }


    // public function studentsList(){
    //     // $students = DB::table('users')->get();
    //     // $students = User::select('id','firstname','gender','email');
    //     // $students = User::all();
    //     $students = DB::table('users')->where('role', '2')->get();
    //     // return DataTables::of($students)->make(true);
    //     // return DataTables::of($students)->make(true);
    //     return Datatables::of($students)
    //                         ->addIndexColumn()
    //                         ->addColumn('actions', function($row){
    //                             return '<div>
    //                                         <button data-id="'.$row->id.'" id="viewStudentBtn"><i class="material-icons text-info mr-2">visibility</i></button>
    //                                         <button><i class="material-icons text-danger" >delete</i></button>
    //                                     </div>';
    //                         }) 
    //                         ->rawColumns(['actions'])
    //                         ->make(true);

    // }

    // get student detail

    // public function studentDetails(Request $request){
    //     $student_id = $request->id;

    //     $studentDetails = User::find($student_id);


    //     return response()->json(['details'->$studentDetails]);
    // }






    // public function studentDetails(Request $request){
    //     // $studentDetails = User::find(Auth::user()->id);

    //     $student_id = $request->id;
    //     // $studentDetail = Auth::user()->id;
    //     $studentDetails = User::find($student_id);
    //     // $studentDetails = User::find($student_id);

    //     return response()->json(['details'->$studentDetails]);
    // }
}
