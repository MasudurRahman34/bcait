<?php

namespace App\Http\Controllers;

use App\question;
use App\qsoption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.set_question');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question=new question();
        $question->question=$request->question;
        $question->question_no=$request->question_no;
        $question->class=$request->className;
        $question->save();
        foreach($request->option as $key=>$value){
            if($key!==0){
            $qsoption=new qsoption();
            $qsoption->question_id=$question->id;
            $qsoption->option=$value;
            if($request->right_answer==$key){
                // $qsoption->right_ans=$request->right_answer;
                $qsoption->right_ans=1;
            }
            $qsoption->save();
            }
        }
       
        return response()->json($qsoption);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($class)
    {
        $getQuestionByClass= question::where('class', $class)->with('qsoption')->orderBy('id','desc')->get();
        return \response()->json($getQuestionByClass);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {$getQuestionBId= question::where('id', $id)->with('qsoption')->orderBy('id','desc')->get();
        return \response()->json($getQuestionBId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question=question::find($id);
        $qsoptions=qsoption::where('question_id', $id)->get();
        $question->question=$request->question;
        $question->class=$request->className;
        // foreach($qsoptions as $key=>$value){
        //     if($key!==0){
        //     //$qsoption=new qsoption();
        //     $qsoption->question_id=$question->id;
        //     $qsoption->option=$value;
        //     if($request->right_answer==$key){
        //         // $qsoption->right_ans=$request->right_answer;
        //         $qsoption->right_ans=1;
        //     }
        //     $qsoption->save();
        //     }
        // }
        $question->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($questio)
    {
        $qs=question::with('qsoption')->findOrFail($questio);
        $qs->delete();
         //$opid=[];
        foreach ($qs->qsoption as $key => $value) {
         $qsop=qsoption::find($value['id']);
         $qsop->delete();
        }
        //$qs->qsoption->delete();
        return response()->json("success");
        
    }
}
