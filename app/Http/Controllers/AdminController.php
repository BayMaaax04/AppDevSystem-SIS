<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

}
