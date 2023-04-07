
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header"><span class="text-left">{{ __('Exam Time') }}</span> <span class="pull-right" id="timer">{{ __('time') }}</span></div>

                <div class="card-body" id="expir">
                <form action="{{route('store.exam')}}" method="post" onsubmit="document.getElementById('submit').disabled=true;
                document.getElementById('myButton').value='Submitting, please wait...';>
                    @csrf
                    @foreach ($randomQuestions as $item)
                        
                    
                    <div class="mb-3 ml-1">
                    <h5 class="text-info">{{$item->question_no}}. {{$item->question}}</h5>
                            @foreach ($item->qsoption as $qs_option)
                            <div class="form ml-3">
                                <input class="form-check-i" name="ans[{{$item->question_no}}]" type="radio" id="" value="{{$qs_option->id}}">
                                <label class="form-check-l" for="">{{$qs_option->option}}</label>
                            </div>
                            @endforeach
                        
                    </div>
                    @endforeach
                    <div class="card-footer">
                        <button type="submit" id="submit" class="btn btn-warning btn-lg">Submit</button>
                    </div>
                </form>
            </div>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
//         $("input[name='ans[]']:checked").each(function ()
// {
//     alert('working');
// }); 
    $(":radio").click(function () {
            var roll=true;
            $(":radio").each(function () {
              name=$(this).attr('name');
              ///console.log(name);
              
              if($(':radio[name="'+name+'"]:checked').length){
                $(':radio[name="'+name+'"]').css('pointer-events','none');
              }
            });
            return roll;
          });

          // Set the date we're counting down to
                var countDownDate = new Date().setTime();
                endDate_Time=new Date().toDateString()+" {{$end_time}}";
                var countDownDate = new Date(endDate_Time).getTime();
               // var end_time= "{{$end_time}}";
                console.log(endDate_Time);

                // Update the count down every 1 second
                var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();
                    
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                    
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                // Output the result in an element with id="demo"
                document.getElementById("timer").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
                    
                // If the count down is over, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("submit").click();
                    document.getElementById("expir").innerHTML = "EXPIRED";
                }
                }, 1000);
        });
</script>
@endsection
