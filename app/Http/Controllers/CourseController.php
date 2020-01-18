<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cource;
use App\cource_user;
use App\Teacher;

use Validator;


use App\User;

class CourseController extends Controller
{
    public function getAll(Request $request) {
        $search_text = $request['search_text'];
        $cources=Cource::with(['user','tag.user'])->whereHas('tag.user', function($q) use ($search_text){
            $q->where('name', 'LIKE', '%' . $search_text . '%');
        })->get();
        
        return $cources;

    }
    public function create(Request $request){
        // $validator = Validator::make($request->all(), [ 
        //     'name' => 'required|unique:cources', 
        //     'selected_teacher' => 'required', 
        //     'selected_students' => 'required', ]);
        //     if ($validator->fails()) { 
        //         return response()->json(['error'=>$validator->errors()], 422);            
        //     } 
        $teacher=User::where('name','like',$request['selected_teacher'])->get()->first();
        $cource=new Cource;
        $cource->name=$request['name'];
        $cource->user_id=$teacher->id;
        $cource->save();

        //saving students
        $students=$request['selected_students'];
        foreach($students as $student){
            $cource->tag()->attach($student);
        }
    }
    public function getTeachers(Request $request)   
    {
        $onlyBusy = $request['onlyBusy'];
        if($request['onlyBusy']=='false'){
            $user=Cource::with(['user','tag.user'])->get();
        }
        else{
            $busy=cource_user::pluck('cource_id');
            $user = Cource::with('user')
            ->whereNotIn('id', $busy)
            ->get();
        }
     return $user;

    }
}
