<?php

namespace App\Http\Controllers;

use Auth;
use Response;
use DataTables;
use App\Models\Subject;
use App\Models\Professor;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator, Input, Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class ProfessorController extends Controller
{
    function professors(){
        $professor = Professor::with('subjects')->get();
        return view('dashboards.admins.professors',compact('professor'));
    }
    //Add new professor
    public function addProfessor(Request $request){
        $validator = Validator::make($request->all(),[
            'professor_name'=> 'required|unique:professors',
            'professor_email'=> 'required|email'
        ]);

        // $validated = $request->validate([
        //     'professor_name'=> 'required|unique:professors',
        //     'professor_email'=> 'required',
        // ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
            // return Response::json(array(
            //     'code' => 0,
            //     'errors' => $validator->errors()->toArray()
        
            // ), 400);
        }else{
            $professor = new Professor();
            $professor->professor_name = $request->professor_name;
            $professor->professor_email = $request->professor_email;
            $query = $professor->save();

            if(!$query){
                return response()->json(['code'=>0, 'msg'=> 'Something went wrong, Please try again']);
            }else{
                return response()->json(['code'=>1, 'msg'=> 'New Professor has been successfully saved']);
            };

        }


    }
// Get All professor
    public function professorsList(){

        $professor = Professor::all();
        return Datatables::of($professor)
                            ->addIndexColumn()
                            ->addColumn('actions', function($row){
                                return '<div>
                                            <button data-id="'.$row->id.'" data-toggle="tooltip" data-placement="bottom" title="View Profile" id="editProfessorBtn"><i class="material-icons text-warning mr-2">edit</i></button>

                                            <button data-id="'.$row->id.'" data-toggle="tooltip" data-placement="bottom" title="Delete Professor" id="deleteProfessorBtn"><i class="material-icons text-danger" >delete</i></button>
                                        </div>';
                            }) 
                            ->rawColumns(['actions'])
                            ->make(true);

    }

// Get all professor detail
    public function professorDetails(Request $request){
        $professorid = $request->id;
        $professorDetails= Professor::find($professorid);
        return response()->json(['details'=>$professorDetails]);
    }

    // Update professor Detail

    public function updateProfessorDetails(Request $request){

        $validator = Validator::make($request->all(),[
            'professor_n'=> 'required|unique:professors,professor_name,'.$request->cid,
            'professor_e'=> 'required|email'
        ]);

        // $request->validate([
        //     'professor_name'=> 'required|unique:professors,professor_name,'.$professorid,
        //     'professor_email'=> 'required'
        // ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
            // return Response::json(array(
            //     'code' => 0,
            //     'errors' => $validator->errors()->toArray()
        
            // ), 400);
        }else{
            $professor = Professor::find($request->cid);
            $professor->professor_name = $request->professor_n;
            $professor->professor_email = $request->professor_e;
            $query = $professor->save();
            
    
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Professor details have been updated.']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong, Please try again.']);
            }
        }
    }

    // Delete professor
    public function deleteProfessorDetails(Request $request){
        $professorid = $request->id;

        // $professor = Professor::with('subjects')->where('id', $professorid )->first();

        // $professor->subject()->wherePivot('professor_id', '!=', 3)->detach();

        $query = Professor::find($professorid)->delete();


        if($query){
            return response()->json(['code'=>1, 'msg'=>'Professor has been deleted from database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong, Please try again.']);
        }
    }
}