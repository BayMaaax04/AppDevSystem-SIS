<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
// use Illuminate\Validation\Validator;
use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    function index(){
        return view('dashboards.users.index');
    }
    function profile(){
        return view('dashboards.users.profile');
    }
    function registration(){

        $courses = Course::with('subjects')->latest()->get();
        return view('dashboards.users.registration', compact('courses'));
    }

    function application(){
        $courses = Course::with('subjects')->latest()->get();
        return view('dashboards.users.application', compact('courses'));
    }
    function submit_application(Request $request){
        $subject->subject_abbreviation = $request->subject_abbreviation[$i];
        $subject->subject_title = $request->subject_title[$i];
        $subject->subject_unit = $request->subject_unit[$i];
        $subject->subject_description = $request->subject_description[$i];
        $subject->subject_description = $request->subject_description[$i];
    }

    function schedule(){
        return view('dashboards.users.schedule');
    }
    function grading(){
        return view('dashboards.users.grading');
    }
    // function settings(){
    //     return view('dashboards.users.settings');
    // }
    function accountSettings(){
        return view ('dashboards.users.settings');
    }


    function updateInfo(Request $request){
        $validator = Validator::make($request->all(),[
            'lastname'=>'required',
            'firstname'=>'required',
            'middlename'=>'required',
            // 'gender'=>'required|string',
            // 'civil_status'=>'required',
            // 'birthday'=>'required',
            // 'birthplace'=>'required',
            // 'religion'=>'required',
            // 'nationality'=>'required',
            // 'address'=>'required',
            // 'city'=>'required',
            // 'province'=>'required',
            // 'zipcode'=>'required',
            // 'guardianName'=>'required',
            // 'guardianNumber'=>'required',
            // 'guardianEmail'=>'required',
            // 'guardianAddress'=>'required',

            // 'email'=>[
            //     'required',
            //     'email',
            //     'unique:users'.Auth::user()->id
            // ]
        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $query = User::find(Auth::user()->id)->update([
                'lastname'=>$request->lastname,
                'firstname'=>$request->firstname,
                'middlename'=>$request->middlename,
                'gender'=>$request->gender,
                'civil_status'=>$request->civil_status,
                'birthday'=>$request->birthday,
                'birthplace'=>$request->birthplace,
                'religion'=>$request->religion,
                'nationality'=>$request->nationality,
                'address'=>$request->address,
                'city'=>$request->city,
                'province'=>$request->province,
                'zipcode'=>$request->zipcode,
                'guardianName'=>$request->guardianName,
                'guardianNumber'=>$request->guardianNumber,
                'guardianEmail'=>$request->guardianEmail,
                'guardianAddress'=>$request->guardianAddress,
            ]);

            if(!$query){
                return response()->json([
                    'status'=>0,
                    'msg'=>'Something went wrong.'
                ]);
            }else{
                return response()->json([
                    'status'=>1,
                    'msg'=>'Your profile info has been updated successfully.'
                ]);
            }
        }
    }

    function updatePicture(Request $request){
        $path = 'users/images/';
        $file = $request->file('user_image');
        $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';
        // upload new image
        $upload = $file->move(public_path($path), $new_image_name);

        if( !$upload ){
            return response()->json(['status'=>0, 'msg'=>'Something went wrong, upload new picture failed.']);
        }else{
            // Get Old Picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if( $oldPicture != '' ){
                if( \File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }

            // Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_image_name]);

            if( !$upload ){
                return response()->json(['status'=>0, 'msg'=>'Something went wrong, updating picture in database failed.']);
            }else{
                return response()->json(['status'=>1, 'msg'=>'Your profile has been updated successfully.']);
            }
        }
    }

    function changePassword(Request $request){
        $request->validate([
            'currentPassword'=>[
                'required', function($attribute, $value, $fail){
                    if ( !Hash::check($value, Auth::user()->password)){
                        return $fail(_('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'newPassword'=>[
                'required',
                'min:8',
                'max:30',
                Password::min(8)
                ->MixedCase()
                ->letters()
                ->numbers()
                ->uncompromised(),
            ],
            'confirmPassword'=>'required|same:newPassword'
        ]);

        
        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->currentPassword, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }
        // $user = User::where('email', $request->email)
        //         ->update(['password' => Hash::make($request->password)]);

        $user->password = Hash::make($request->newPassword);
        $user->save();
    
        return redirect()->back()->with('success', 'Password successfully changed!');

    }

  
}
