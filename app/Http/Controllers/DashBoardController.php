<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Payments;
use App\Models\User;
use CreateUsersTable;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public  function AddNewCourse(Request $request)
    {
        
        if ($request->isMethod('post')) {
           
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
     
            $saved = Course::create($data);
            $course_id = $saved['id'];
            // dd($course_id);
            return redirect()->route('newlesson', ['new' => $course_id])->with('success', 'Course Added Successfully');
        }
        return view('admin.form');
    }


    public function AddNewModuleAndLessons(Request $request)
    {
        $data = $request->new;

        if ($request->isMethod('post')) {
           
            // $lesson->user_id = Auth::user()->id;
            $data = $request->all();
           

            $module['title'] = $data['moduletitle'];
            $module['user_id'] = Auth::user()->id;
            $module['course_id'] = $data['course_id'];
            $module_id = Module::create($module)->id;

            if ($data['lesson1'] != null) {
                $lesson['title'] = $data['lesson1'];
                $lesson['video_link'] = $data['lesson1v'];
                $lesson['user_id'] = Auth::user()->id;;
                $lesson['course_id'] = $data['course_id'];
                $lesson['module_id'] = $module_id;  
                $saved = Lesson::create($lesson);

            } if ($data['lesson2'] != null) {
                $lesson['title'] = $data['lesson2'];
                $lesson['video_link'] = $data['lesson2v'];
                $lesson['user_id'] = Auth::id();
                $lesson['course_id'] = $data['course_id'];
                $lesson['module_id'] = $module_id;
                $saved = Lesson::create($lesson);

            } if ($data['lesson3'] != null) {
                $lesson['title'] = $data['lesson3'];
                $lesson['video_link'] = $data['lesson3v'];
                $lesson['user_id'] = Auth::id();
                $lesson['course_id'] = $data['course_id'];
                $lesson['module_id'] = $module_id;
                $saved = Lesson::create($lesson);

            } if ($data['lesson4'] != null) {
                $lesson['title'] = $data['lesson4'];
                $lesson['video_link'] = $data['lesson4v'];
                $lesson['user_id'] = Auth::id();
                $lesson['course_id'] = $data['course_id'];
                $lesson['module_id'] = $module_id;

                $saved = Lesson::create($lesson);
            } if ($data['lesson5'] != null) {
                $lesson['title'] = $data['lesson5'];
                $lesson['video_link'] = $data['lesson5v'];
                $lesson['user_id'] = Auth::id();
                $lesson['course_id'] = $data['course_id'];
                $lesson['module_id'] = $module_id;
                $saved = Lesson::create($lesson);
            }
            $data = $data['course_id'];
            return view('admin.newlesson', compact('data'))->with('success', 'Module and Lesson Added Successfully');

        }
        return view('admin.newlesson', compact('data'));
    }


    

//relese an instructor from suspension
    public function releaseUser(Request $request)
    {
        $data = $request->all();
        $user = User::first()->where('role_user',)->where('role_id');
        dd($data, $user);

        $user->status = 1;
        $user->save();
        return redirect()->route('admin.dashboard');
    }


    public function userPayments(Request $request)
    {

        
   
    }
    
       
    //save user payment to payment table

    public function savePayment(Request $request)
    {
        $data = $request->all();
        $user = User::first()->where('role_user',)->where('role_id');
        dd($data, $user);

        $user->status = 1;
        $user->save();
        return redirect()->route('admin.dashboard');
    }







    public function payment(Request $request){
// dd($request->all());
        if($request['response']['status']=='success'){
            //for debby's sake
            $all_request = $request->all();
            $all_request["course_id"] = $request['course_id'];
            $all_request["student_id"] = $request['student_id'];
            $all_request["instructor_id"] = $request['instructor_id'];
            $all_request["amount_paid"] = $request['amount_paid'];
            $all_request["status"] = $request['response']['status'];
            $all_request["ref"] = $request['response']['reference'];

            if(Payments::create($all_request)){
                return response()->json([
                    'status' => 'success',
                    'code' => 200
                ]);
            }
            
            // $date = date('Y m d');
            // Subcription::where('start_date', '>', $date)->where('end_date','<',Carbon::parse($date->addDays(30))->get()

        }else{
            return response()->json([
                'status' => 'failed',
                'code' => 400
            ]); 
        }
    }
    

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
