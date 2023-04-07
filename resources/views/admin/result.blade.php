@extends('shurjopayment.layouts.master')
@section('title')
Student List
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Welcome to DashBoard') }}</div>

                <div class="card-body">
                    <div class="row">
                    <form action="{{route('admin.publish.result')}}" method="post">
                        @csrf
                        <div class="modal fade" id="publish_result" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                  <button type="submit" class="btn btn-primary" >Submit</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>

                        <div class="col-md-12">
                            <div class="card-header"><span class="text-right"><button data-toggle="modal" data-target="#publish_result" class="btn btn-sm btn-info">{{ __('Publish result') }}</button></span></div>
                            <div class="tile">
                                <div class="tile-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="sampleTable">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Student Id</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>score</th>
                                                <th>Publishing_status</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
      @include('shurjopayment.partials.js.datatable');
      <script>
       
           var table= $('#sampleTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'excel',
                ],
                processing:true,
                serverSide:true,
                ajax:"{{url('/admin/result/synctable')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'user_id', name: 'user_id' },
                    { data: 'name', name: 'name' },
                    { data: 'classname', name: 'classname' },
                    { data: 'result', name: 'result' },
                    { data: 'publishing_status', name: 'publishing_status' },
                    
                ]
            });
            </script>
@endsection
