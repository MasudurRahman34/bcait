@extends('shurjopayment.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                    {{ __('Exam settings') }}

                  </button>
                  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="my_form">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Select Class</label>
                                 
                                    <select id="class" class="form-control" name="class">
                                        <option value="Three">Three</option>
                                        <option value="Four">Four</option>
                                        <option value="Five">Five</option>
                                        <option value="Six">Six</option>
                                        <option value="Seven">Seven</option>
                                        <option value="Eight">Eight</option>
                                        <option value="Demo">Demo</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Rules</label>
                                  <textarea  class="form-control" name="rules" id="rules" cols="5" rows='5'></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date</label>
                                    <input type="date" class="form-control" id="exam_date" name="exam_date">
                                  </div>
                                <div class="form-group">
                                  <label class="" for="exampleCheck1">Start Time</label>
                                  <input type="time" class="form-control"  name="start_time" id="start_time">
                                </div>
                                <div class="form-group">
                                    <label class="" for="exampleCheck1">End Time</label>
                                    <input type="time" class="form-control"  name="end_time" id="end_time">
                                </div>
                                <div class="form-group">
                                    <label class="" for="exampleCheck1">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                              
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div></div>
                <div class="card-body">
                    <div class="row" id="setting_list">
                        
                       
        
                          
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('js/plugins/summernote/summernote.css') }}">
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/plugins/summernote/summernote.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
    exam_setting_list();
});
    $('#rules').summernote();

    $('#my_form').submit(function (e) {
        e.preventDefault();
         
    var form_data= new FormData(this);
    console.log(form_data);

    // if (id>0) {
    //                 var url="{{ url('/admin/update/question') }}"+"/"+id;
    //             }else{
    //             var url="{{ url('/admin/store/question') }}"
    //             }
    $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
               });
       $.ajax({
         type: "post",
         url: "{{ url('/admin/exam/setting/store') }}",
         data: form_data,
         cache:false,
        contentType: false,
        processData: false,
         
         success: function (response) {
          console.log(response);
          exam_setting_list();
          document.getElementById("my_form").reset();
        //   var className=$('#className option:selected').val();
        //   showQuestion(className);
          
         }
       });
        
    });
    function exam_setting_list(){
        $.ajax({
            type: "get",
            url: "{{url('/admin/exam/setting/list')}}",
            success: function (response) {
                $('#setting_list').html(response);
            }
        });
    }
    function btnEdit(id){
        $.ajax({
            type: "get",
            url: "{{url('/admin/exam/setting/')}}"+"/"+id,
            success: function (response) {
                console.log(response);
                //console.log(response.rules, response.exam_date,response.start_time, response.end_time);
                $('#modal').modal('show');
                $('#class').val(response.class);
                $('#rules').summernote('code', response.rules);
                $('#exam_date').val(response.date);
                $('#start_time').val(response.start_time);
                $('#end_time').val(response.end_time);
                
            }
        });
    }
    function btnDelete(id){

var r = confirm("Danger! Your Are going to delete data. Are you sure ?");
if (r == true) {
    $.ajax({
            type: "get",
            url: "{{url('/admin/exam/setting/delete')}}"+"/"+id,
            success: function (response) {
                console.log(response);
                exam_setting_list();
                //console.log(response.rules, response.exam_date,response.start_time, response.end_time);
                
            }
        });
} else {
   "Your Data  is Safe !";
}
       
    }
</script>

@stop
