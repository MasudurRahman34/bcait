
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Result') }}</div>

                <div class="card-body">
                    
                        {{-- <h5 class="m-b-1">Basic example</h5> --}}
                        <table class="table m-md-b-0">
                            <thead>
                                <tr>
                                    <th>Question No</th>
                                    <th>Question</th>
                                    <th>Your Answer</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                <tr>
                                    <th scope="row">{{$result->qsoption->question->question_no}}</th>
                                    <td>{{$result->qsoption->question->question}}</td>
                                    <td>{{$result->qsoption->option}}</td>
                                    <td>{{$result->qsoption->right_ans}}</td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection
