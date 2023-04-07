<?php

namespace App\Http\Controllers;

use App\Examsettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamsettingsController extends Controller
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
        return view ('admin.exam_setting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $exam_setting_lists=Examsettings::get();
        return view('admin.exam_setting_list',compact(('exam_setting_lists')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam_s = Examsettings::firstOrNew(['class' =>  request('class')]);

        //$exam_s= new Examsettings();
        $exam_s->rules=$request->rules;
        $exam_s->class=$request->class;
        $exam_s->date=$request->exam_date;
        $exam_s->start_time=$request->start_time;
        $exam_s->end_time=$request->end_time;
        $exam_s->status=$request->status;
        $exam_s->save();
        return response()->json($exam_s);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Examsettings  $examsettings
     * @return \Illuminate\Http\Response
     */
    public function show(Examsettings $examsettings)
    {
        return response()->json($examsettings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Examsettings  $examsettings
     * @return \Illuminate\Http\Response
     */
    public function edit(Examsettings $examsettings)
    {
        return response()->json($examsettings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Examsettings  $examsettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examsettings $examsettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Examsettings  $examsettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examsettings $examsettings)
    {
        $examsettings->delete();
        return response()->json("success");
    }
}
