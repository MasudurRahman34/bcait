@extends('shurjopayment.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><span class="text-right"><button data-toggle="modal" data-target="#exampleQuestion" class="btn btn-sm btn-info">{{ __('Set Question') }}</button></span></div>
                <!--select class modal-->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Select Class</h5>
                          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button> --}}
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="class">Select Class</label>
                              <select id="className" class="form-control" name="className">
                                <option value="Three">Three</option>
                                <option value="Four">Four</option>
                                <option value="Five">Five</option>
                                <option value="Six">Six</option>
                                <option value="Seven">Seven</option>
                                <option value="Eight">Eight</option>
                              </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal"  id="btnClass">OK</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- modal question --}}
                  <div class="modal fade" id="exampleQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleQuestionTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Set Question</h5>
                          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button> --}}
                        </div>
                        <form class="form-horizontal" id="qsform">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                            
                               <div class="form-group row">
                                 <label class="control-label col-md-3 col-12">Question No</label>
                                 <div class="col-md-8 col-12">
                                  <input class="form-control" type="number" name="question_no" id="question_no" value="0" min="1" max="100" required>
                                 </div>
                               </div>
                               <div class="form-group row">
                                 <label class="control-label col-md-3 col-12">Question</label>
                                 <div class="col-md-8 col-12">
                                   <textarea class="form-control" rows="8" cols="8" id="question" name="question" required></textarea>
                                 </div>
                               </div>
                               <div class="form-group row">
                                 <label class="control-label col-md-3">Option 1</label>
                                 <div class="col-md-8">
                                   <input class="form-control" type="text" name="option1" required>
                                 </div>
                               </div>
                               <div class="form-group row">
                                 <label class="control-label col-md-3">Option 2</label>
                                 <div class="col-md-8">
                                   <input class="form-control" type="text" name="option2" required>
                                 </div>
                               </div>
                               <div class="form-group row">
                                 <label class="control-label col-md-3">Option 3</label>
                                 <div class="col-md-8">
                                   <input class="form-control" type="text" name="option3" required>
                                 </div>
                               </div>
                               <div class="form-group row">
                                 <label class="control-label col-md-3">Option 4</label>
                                 <div class="col-md-8">
                                   <input class="form-control" type="text" name="option4" required>
                                 </div>
                               </div>
                               <div class="form-group row">
                                 <label class="control-label col-md-3">Right Answer</label>
                                 <div class="col-md-8">
                                   <input class="form-control" type="number" name="right_answer" value="1" max="4" required>
                                 </div>
                               </div>
                             
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="form-control btn btn-success" id="btnSubmit">Submit</button>
                        </div>
                      </form>
                      </div>
                    
                    </div>
                  </div>
        </div>
        
        <div class="tile">
          <div class="row">
            <div class="col-lg-12">
              <div id="qs">
                
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function () {
    $("#exampleModalCenter").modal({
      show:true,
      backdrop: 'static',
      keyboard: false
      });
  });
    $('#btnClass').click(function (e) { 
        // e.preventDefault();
        // alert('working');
        var className=$('#className option:selected').val();
       showQuestion(className)
       });
       
       function showQuestion(className){

        $.ajax({
          type: "get",
          url: "{{ url('/admin/get/question/class/') }}"+"/"+className,
          success: function (response) {
            
            var qs2="";
            
            var i=1;
            response.forEach(qs);
            //var qsoption="";
            function qs(item,index){
              var qsoption="";
              item['qsoption'].forEach(option)
              
               qs2+=`<fieldset class="form-group">
                  <h5>`+item['question_no']+'.'+item['question']+`</h5>`+qsoption+`<button class="btn btn-danger" onclick=btnDelete(`+item['id']+`)>Delete</button></fieldset>`
                  // <h5>`+item['question_no']+'.'+item['question']+`</h5>`+qsoption+`<button class="btn btn-warning" onclick=btnEdit(`+item['id']+`)>Edit</button> <button class="btn btn-danger" onclick=btnDelete(`+item['id']+`)>Delete</button></fieldset>`
                  i++;
                  function option(item,index){
               qsoption+=`<div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" name="option[`+i+`]" type="radio" value="`+item['option']+`"`+(item['right_ans']==1 ? "checked":"")+`>`+item['option']
                    +`</label>
                  </div>`
            }
                  
            }
            
           
            $("#qs").html(qs2);
            console.log(response);;
          }
        });
       }

       $('#qsform').submit(function (e) {
        var id=$('#btnSubmit').val();
         e.preventDefault();
         var question=$("#question").val();
         var question_no=$("#question_no").val();
         var right_answer=$("input[name='right_answer']").val();
         var className=$('#className option:selected').val();
         var option1=$("input[name='option1']").val();
         var option2=$("input[name='option2']").val();
         var option3=$("input[name='option3']").val();
         var option4=$("input[name='option4']").val();
         var option=[];
         option[1]=option1;
         option[2]=option2;
         option[3]=option3;
         option[4]=option4;
         
              
    console.log(option, question,right_answer,className);
    if (id>0) {
                    var url="{{ url('/admin/update/question') }}"+"/"+id;
                }else{
                var url="{{ url('/admin/store/question') }}"
                }
    $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
               });
       $.ajax({
         type: "post",
         url: "{{ url('/admin/store/question') }}",
         data: {
           'question':question,
           'question_no':question_no,
           'right_answer':right_answer,
           'className':className,
           'option':option,
         },
         success: function (response) {
          console.log(response);
          document.getElementById("qsform").reset();
          var className=$('#className option:selected').val();
          showQuestion(className);
          
         }
       });
        
    });



function btnEdit(id){
  $('#btnSubmit').val(id);
  $.ajax({
         type: "get",
         url: "{{ url('/admin/edit/question') }}"+"/"+id,
         success: function (response) {
          console.log(response);
          console.log(response[0].question);
          $('#exampleQuestion').modal('show');
          $("#question").val(response[0].question);
          response[0].qsoption.forEach(qsoption);
          function qsoption(element, index){
            index+=1;
            var option='option'+index;
            var inp=$("input[name="+option+"]").val(element.option);
            //console.log(element, index, option,inp);
            if (element.right_ans==1) {
              $("input[name='right_answer']").val(index);
            }
          }
          //document.getElementById("qsform").reset();
          //showQuestion(className);
          
          
         }
       });
}
function btnDelete(id){
 
  if( confirm('Are you sure to delete data ?')){
  $.ajax({
         type: "get",
         url: "{{ url('/admin/destory/question') }}"+"/"+id,
         success: function (response) {
          console.log(response);
          //document.getElementById("qsform").reset();
          var className=$('#className option:selected').val();
          showQuestion(className);
          
          
         }
       });
  }else{
    alert('data is safe');
  }
}
</script>

@stop
