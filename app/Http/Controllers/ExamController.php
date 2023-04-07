<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Exam;
use App\Examsettings;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\question;
use App\qsoption;
use DataTables;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
            if(Auth::user()->sp_code =='000'){
                $exam_settings=Examsettings::where('class', Auth::user()->classname)->get();
               // dd($exam_settings);
                return view('exam.exam_rule', compact('exam_settings'));
            }
            else{
                return view('shurjopayment.pages.shurjopay');
            }

        
    }

    public function startExam(){
            //dd(date('H:i'));
        $exam_setting=Examsettings::where('class',Auth::user()->classname)->where('date',date('Y-m-d'))->first();
        $is_exist_exam=Answers::where('class',Auth::user()->classname)->where('user_id', Auth::user()->id)->exists();
        
       if($is_exist_exam ==false){
       
       
            if($exam_setting){
                $start_time=intval(strtotime($exam_setting->start_time));
                $end_time=intval(strtotime($exam_setting->end_time));
                $this_time=intval(strtotime(date("H:i")));
                //dd(date($end_time));
              if($this_time>=$start_time && $this_time<=$end_time){
                $randomQuestions =question::where('class',Auth::user()->classname)->with('qsoption')
                ->inRandomOrder()
                ->get();
                return view('exam.start_exam')->with('randomQuestions',$randomQuestions)->with('end_time',$exam_setting->end_time);
              }
              else{print "Exam is not available at this Moment "."<a href='/'>Back</a>";
              }
                //dd($exam_setting->end_time,date("H:i"),$exam_setting->start_time,$end_time, strtotime(date("H:i")),$start_time);
               // if()

            
            //dd($randomQuestions);
        
           
            }else{
                print "Exam is not available at this Moment "."<a href='/'>Back</a>";
            }
        }else{
            print "Your exam has been already taken "."<a href='/'>Back</a>";
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//dd(Auth::user()->classname);
        $ans_option=[];
        $user_id=Auth::user()->id;
        //dd($request->ans);
        if($request->ans !==null){
       foreach ($request->ans as $key => $value) {
           $answer= new Answers();
           $answer->option_id=$value;
           $answer->user_id=$user_id;
           $answer->class=Auth::user()->classname;
           $answer->save();
       }
    }
       print("Your Exam is Over "."<a href='/'>Back</a>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function result($student_id)
    {   
        $published_status=DB::table('answers')->where('status', 1)->exists();
        if($published_status or Auth::user()->is_admin==1){
            $results= Answers::where('user_id', $student_id)->with('qsoption')->get();
            return view('result.result',compact('results'));
        }else{
           print("Result Did Not Publish Yet "."<a href='/'>Back</a>");
        }
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function my_exam_rule($examsettings)
    {
       
        return view('admin.exam_setting_list',compact(('exam_settings')));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
