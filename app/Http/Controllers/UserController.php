<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        return view('dashboards.users.index');
    }
    function profile(){
        return view('dashboards.users.profile');
    }
    function registration(){
        return view('dashboards.users.registration');
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
            'email'=>['required','email','unique:users'.Auth::user()->id]
        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            // $query = User::find(Auth::user()->id)->update([
            //     'lastname'=>$request->lastname,
            //     'firstname'=>$request->firstname,
            //     'middlename'=>$request->middlename,
            // ]);

            // if(!$query){
            //     return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
            // }else{
            //     return response()->json(['status'=>1,'msg'=>'Your profile info has been updated successfully.']);
            // }
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
        // Validate Form
        // $validator = \Validator::make($request->all(),[
        //     'currentPassword'=>[
        //         'required', function($attribute, $value, $fail){
        //             if ( !Hash::check($value, Auth::user()->password)){
        //                 return $fail(_('The current password is incorrect'));
        //             }
        //         },
        //         'min:8',
        //         'max:30'
        //     ],
        //     'newPassword'=>'required|min:8|max:30',
        //     'cnewPassword'=>'required|same:newPassword'
        // ]);

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
