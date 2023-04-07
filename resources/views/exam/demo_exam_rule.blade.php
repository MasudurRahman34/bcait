
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Exam') }}</div>

                <div class="card-body">
                    <div class="row">
                    @foreach ($exam_settings as $item)
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item active">Class: {{$item->class}}</li>
                            <li class="list-group-item">Exam Date: {{$item->date}}</li>
                                <li class="list-group-item">Start time: {{$item->start_time}}</li>
                                <li class="list-group-item">End Time: {{$item->end_time}}</li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            {!!$item->rules!!}
                        </div>
                        <a href="{{route('demo.exam.start.exam')}}" class="btn btn-success m-3">Start Exam</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection
