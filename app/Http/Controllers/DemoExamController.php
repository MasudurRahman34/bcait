<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Answers;
use App\Exam;
use App\Examsettings;
use Auth;
use DB;
use App\question;
use App\qsoption;
use DataTables;

class DemoExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->sp_code =='000'){
            $exam_settings=Examsettings::where('class', "Demo")->get();
           // dd($exam_settings);
            return view('exam.demo_exam_rule', compact('exam_settings'));
        }
        else{
            return view('shurjopayment.pages.shurjopay');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function startExam(){
        //dd(date('H:i'));
    $exam_setting=Examsettings::where('class',"Demo")->where('date',date('Y-m-d'))->first();
    $is_exist_exam=Answers::where('class',"Demo")->where('user_id', Auth::user()->id)->exists();
    
   if($is_exist_exam ==false){
   
   
        if($exam_setting){
            $start_time=intval(strtotime($exam_setting->start_time));
            $end_time=intval(strtotime($exam_setting->end_time));
            $this_time=intval(strtotime(date("H:i")));
            //dd(date($end_time));
          if($this_time>=$start_time && $this_time<=$end_time){
            $randomQuestions =question::where('class', "Demo")->with('qsoption')
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ans_option=[];
        $user_id=Auth::user()->id;
        //dd($request->ans);
        if($request->ans !==null){
        foreach ($request->ans as $key => $value) {
           $answer= new Answers();
           $answer->option_id=$value;
           $answer->user_id=$user_id;
           $answer->class="Demo";
           $answer->save();
            }
        }
        print("Your Exam is Over "."<a href='/'>Back</a>");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
