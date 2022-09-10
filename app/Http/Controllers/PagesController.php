<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Payments;
use App\Models\Role;
use App\Models\User;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast;
use PhpParser\Node\Expr\Isset_;

use function Symfony\Component\String\b;

class PagesController extends Controller
{

    public function index(Request $request)
    {
        try{
        $courses = Course::paginate('6');
        foreach ($courses as $course) {


            $course->modules = $course->modules()->get();
            //count number of lessons in each course
            $course->lessons = $course->lessons()->count();

            $course->instructor = $course->users->name;
        }
    }catch(\Exception $e)
    {
        $courses = 0;
        return view('index', compact('courses'));
    }
        // dd ($courses[29]->modules[1] -> lessons()->get()[0]->video_link);
    if($request->isMethod('post')){
        
            // Get the search value from the request
            $search = $request->input('search');

            // Search in the title and body columns from the posts table
            $course2 = Course::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->get();

            // Return the search view with the resluts compacted
            foreach ($course2 as $course) {


                $course->modules = $course->modules()->get();
                //count number of lessons in each course
                $course->lessons = $course->lessons()->count();

                $course->instructor = $course->users->name;
            }
            $courses = $course2;
            // dd($courses);
            return view('index', compact('courses'));
    }

    //    $course2 = array(null);

        return view('index', compact('courses'));
    }

   


    public function profile(Request $request)
    {
        if($request->isMethod('post')){

            // dd($request->all());
        $update = User::where('id', Auth::user()->id)->first();
        $update->update([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'skills' => $request->skills,
            'bio' => $request->bio,


 
                $image = $request->file('photo'),
                $image_name = $image->getClientOriginalName(),
                $image->move(public_path('/images'), $image_name),

                $image_path = '/images/' . $image_name,

               
                'photo' => $image_path,
            

        ]);

            return redirect()->back()->with('success', 'Profile Updated Successfully');



    }
        // dd($update);


        return view('admin.profile');
    }




    public function instructor(Request $request, $id = null)
    {

// dd($instructor);
        if ($request->isMethod('post')) {
            $instructor = User::where('id', $request->id)->first();
            // dd($instructor);

            if ($instructor['status'] == 'suspended') {
                $instructor->update([
                    'status' => 'active'

                ]);
             } else{
                $instructor->update([

                    'status' => 'suspended'

                ]);
             
               
            }

            return back()->with(['success', 'Status Updated Successfully']);
        }
        $instructorsStatus = User::all()->where('type', '=', 'instructor')->pluck('status');
        $instructors = User::where('type', '=', 'instructor')->paginate();




        return view('admin.instructors', compact('instructors', 'instructorsStatus'));
    }




    public function singleCourse(Request $request, $id, $user_id = null)
    {


        $courses = Course::findOrfail($id);
        $courses->instructor = $courses->users->name;
        // dd($courses);
        $modules =  $courses->modules;
        $lessons = $courses->lessons;
        // dd($modules);

        // $payments = $courses->payments()->get();  //use first() to get the first record
        // $courses->payments = $payments;

  
         $payments = Auth::user()? (DB::table('payments')->where('course_id', $id)->where('user_id', Auth::user()->id)->first()): 0;
     
        // dd($payments->status);
     

        return view('course_details', compact('courses', 'modules', 'lessons', 'payments'));
    }

    //redirect user to payment page on play button click

    public function allCourses(Request $request)
    {

        if ($request->isMethod('post')) {
        
            // Get the search value from the request
            $search = $request->input('search');

            // Search in the title and body columns from the posts table
            try{
            $course2 = Course::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->get();
            }catch(\Exception $e){
                return back()->with('error', 'Cant search something went wrong');
            }

            // Return the search view with the resluts compacted
            foreach ($course2 as $course) {


                $course->modules = $course->modules()->get();
                //count number of lessons in each course
                $course->lessons = $course->lessons()->count();

                $course->instructor = $course->users->name;
            }
            $courses = $course2;
            // dd($courses);
            return view('courses', compact('courses'));
        }
        try{
        $courses = Course::all();
        }catch(\Exception $e)
        {
            $courses = [];
            return view('courses', compact('courses'));    
        }


        return view('courses', compact('courses'));
    }
    public function error()
    {

        return view('error');
    }




    public function courses()
    {

        $InstructorCourses = Course::where('user_id', Auth::user()->id)->get();
        //  dd($InstructorCourses);

        return view('admin.courses', compact('InstructorCourses'));
    }






    public function form()
    {


        return view('admin.form');
    }






    public function AdminRegister(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'firstname' => 'required|string|',
                'lastname' => 'required|string|',
                'phone' => 'required|string|',
                // 'skills' => 'required|string|',
                // 'bio' => 'required|string|',
                'password' => 'required|string|min:6|confirmed',
            ]);

          
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/images'), $image_name);
                $image_path = '/images/' . $image_name;
            } else {
                $image_path = 'images/default.jpg';
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'status' => 'active',
                'type' => 'instructor',
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'skills' => $request->skills,
                'bio' => $request->bio,
                'photo' => $image_path,
                'password' => Hash::make($request->password),
            ]);

            $user->attachRole('admin');
        } catch (\Exception $e) {
                return back()->with('error', 'An error occurred, It seems you cant register at this time, we are fixing it');
            }
            if($user){
                try{
                Mail::to($user->email)->send(new Welcome($user));
                return redirect()->route('login')->with('success', 'Admin account created successfully , Please check your email for confirmation');
                } catch (\Exception $e) {
                    return back()->with('error', 'Admin account created successfully , confirmation email not sent ');
                }

            }else{
                return back()->with('error', 'Admin account not created, please try again');
            }
        }
        return view('register');
    }





    public function InstructorRegister(Request $request)
    {
        if ($request->isMethod('post')) {
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email',
                'firstname' => 'required|string|',
                'lastname' => 'required|string|',
                'phone' => 'required|string|',
                'skills' => 'required|string|',
                'bio' => 'required|string|',
                'password' => 'required|string|min:6|confirmed',
            ]);

            try{
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('/images'), $image_name);
                $image_path = '/images/' . $image_name;
            } else {
                $image_path = 'images/default.jpg';
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'status' => 'active',
                'type' => 'instructor',
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'skills' => $request->skills,
                'bio' => $request->bio,
                'photo' => $image_path,
                'password' => Hash::make($request->password),
            ]);

            $user->attachRole('instructor');
        } catch (\Exception $e) {
                return back()->with('error', 'An error occurred, make you are not using an email that has been used before, though it seems you cant register at this time, we are fixing it');
            }

            if ($user) {
                try{
                Mail::to($user->email)->send(new Welcome($user));
                return redirect()->route('login')->with('success', 'Instructor account created successfully, Please check your email for confirmation');
            }catch(\Exception $e){
                    
                    return redirect()->route('login')->with('success', 'Instructor account created successfully, but something went wrong we could not send you welcome email. You can login.');
            }
            } else {
                return back()->with('error', 'Instructor account not created, please try again');
            }
        }
        return view('register');
    }


    public function StudentRegister(Request $request, $id = null )
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email',
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'phone' => 'required|string',
                'password' => 'required|string|min:6|confirmed',
            ]);

            
            try{
                if ($request->has('photo')) {
                    $image = $request->file('photo');
                    $image_name = $image->getClientOriginalName();
                    $image->move(public_path('/images'), $image_name);
                    $image_path = '/images/' . $image_name;
                } else {
                    $image_path = '/images/default.jpg';
                }
            $user = User::create([
                'name' => $request->name,
                'email' => strtolower($request->email),
                'status' => 'active',
                'type' => 'student',
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'photo' => $image_path,
                'password' => Hash::make($request->password),
            ]);
            $user->attachRole('user');
            } catch (\Exception $e) {
                return back()->with('error', 'An error occurred, make you are not using an email that has been used before, though it seems you cant register at this time, we are fixing it');
            }


            if ($user ) {
                if ($id) {
                    Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                    Auth::login($user);

                    $url = "/details/$id/".$user->id;
                    return redirect($url);
                }elseif(!$id){
                    try{
                    Mail::to($user->email)->send(new Welcome($user));
                    return redirect()->route('login')->with('success', 'Student account created successfully, Please check your email for confirmation');
                }catch(\Exception $e){
                        return redirect()->route('login')->with('success', 'Student account created successfully, but something went wrong, we could not send you welcome email. You can login '); 
                }

                }
            }

        }

        if($id){
            Session::put('error', 'Please create an account or login to continue');
        }
        return view('register', compact('id'));
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
            ]);

            try{
                $user = User::where('email', $request->email)->first();
            } catch (\Exception $e) {
                return back()->with('error', 'An error occurred, you cant login at this time');
            }


            if ($user && Hash::check($request->password, $user->password)) {
                //check if user instructor status is active
                if ($user->status == 'active') {
                    Auth::login($user);
                    $request->session()->put('user', $user);

                    return redirect()->route('dashboard')->with('success', 'You are logged in successfully');
                } else {
                    return back()->with('error', 'Your account is not active');
                }
            }

            return redirect()->back()->with('error', 'Invalid credentials');
        }
        return view('login');
    }


    public function dashboard(Request $request)
    {
        

        $courses = Course::all()->where('user_id', Auth::user()->id);

        //courses count for an instructor
        $coursesCount = Course::all()->where('user_id', Auth::user()->id)->count();

        //total courses from website
        $allcourses = Course::all()->count();
      
        //total number of instructors
        $allinstructors = User::all()->where('type', 'instructor')->count();

        //total number of students
        $allstudents = User::all()->where('type', 'student')->count();


        //total amount from database
        
        $totalAmount = DB::table('payments')->sum('amount');
        // dd($totalAmount);
        // dd($totalAmount);

        //total earnings for an instructor
       
        $totalInstructorEarnings = DB::table('payments')->where('instructor', Auth::user()->name)->sum('amount');
       
        // dd($totalInstructorEarnings);

        //total students enrolled for an instructor course
        $totalStudentsEnrolled = DB::table('payments')->where('instructor', Auth::user()->name)->count();
        // dd($totalStudentsEnrolled);

        //course enrolled for by a student
        $studentCourseEnrolled = DB::table('payments')->where('user_id', Auth::user()->id)->count();
        //

        //list of course enrolled for by a student
        $enrolled = Payments::with( 'course')->where('user_id', Auth::user()->id)->get();
       
        //all categories 
          $categoryCount = DB::table('categories')->count()
;

        return view('admin.dashboard', compact('courses', 'coursesCount', 'allcourses', 'allinstructors', 'allstudents', 'totalAmount', 'totalInstructorEarnings', 'totalStudentsEnrolled', 'studentCourseEnrolled', 'enrolled', 'categoryCount'));
    }

    public function all(){

        $allcourseslist = Course::with('users')->paginate(8);
        // $allcourseslist = DB::table('courses')->paginate(6);
        // dd($allcourseslist);
             return view('admin.all', compact('allcourseslist'));
    }

    public function deleteCourse($id){
        
        $deleteCourse = Course::find($id);
        
        $deleteCourse->delete();

       

        return redirect()->back()->with('success', 'Course deleted successfully');

    }


   
    



    //add new Category
    public function categories(Request $request){

        if ($request->isMethod('post')) {
            Category::create($request->all());

            return back()->with(['success', 'Category added Successfully']);
        }

        $category = DB::table('categories')->paginate(5);
        
        return view('admin.categories', compact('category'));
    }


    //delete category

    public function deleteCategory($id){
        $deleteCategory = Category::find($id);
        $deleteCategory->delete();

        return redirect()->back()->with('success', 'Category deleted successfully');
    }



    public function viewEnrolledCourses(Request $request, $id, $user_id = null)
    {

    // $courses = Course::find($id);
    // dd($courses);
    // $courses->instructor = $courses->user->name;
    // dd($courses->instructor);
    // $modules =  $courses->modules;
    // $lessons = $courses->lessons;

    // $payments = $courses->payments()->first();

    // $courses->payments = $payments;
    //     $enrolled = Payments::with('course')->where('user_id', Auth::user()->id)->orWhere('course_id', 'course_id')->get();
    //     $en = $enrolled->find($id);
    //    $last = $en->course->with('modules', 'lessons')->first();
    //     dd($last);
    //     dd($enrolled);

    //  dd($enrolled->course());

    // return view('admin.view', compact('courses', 'modules', 'lessons'));
    // return view('course_details');



 

        $courses = Course::findOrfail($id);
        // dd($courses);
        $courses->instructor = $courses->users->name;
        $modules =  $courses->modules;
        $lessons = $courses->lessons;
        // dd($modules);

        // $payments = $courses->payments()->get();  //use first() to get the first record
        // $courses->payments = $payments;

        $payments = Payments::where('course_id', $id)->where('user_id', Auth::user()['id'])->first();
        // dd($payments);

        return view('admin.view', compact('courses', 'modules', 'lessons', 'payments'));



    }

    public function mail(){
        return view('mail.welcome');
    }
   

}
