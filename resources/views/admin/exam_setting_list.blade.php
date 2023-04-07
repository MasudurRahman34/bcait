@foreach ($exam_setting_lists as $item)
    

<div class="col-md-4">
    <ul class="list-group">
        <li class="list-group-item active">Class: {{$item->class}}</li>
    <li class="list-group-item">Exam Date: {{$item->date}}</li>
        <li class="list-group-item">Start time: {{$item->start_time}}</li>
        <li class="list-group-item">End Time: {{$item->end_time}}</li>
      </ul>
</div>
<div class="col-md-8">
    {{-- <ul class="list-group">
        <li class="list-group-item active">Rule of the</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
        <li class="list-group-item active">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul> --}}
      {!!$item->rules!!}
</div>
<div class="col-md-12 m-3">
    <button class="btn btn-warning" onclick="btnEdit({{$item->id}})">edit</button> <button class="btn btn-danger" onclick="btnDelete({{$item->id}})">Delete</button>
</div>
@endforeach