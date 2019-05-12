<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	.pagination>li {
		display: inline;
		padding:0px !important;
		margin:0px !important;
		border:none !important;
	}
	.modal-backdrop {
		z-index: -1 !important;
	}
/*
Fix to show in full screen demo
*/
iframe
{
	height:700px !important;
}

.btn {
	display: inline-block;
	padding: 6px 12px !important;
	margin-bottom: 0;
	font-size: 14px;
	font-weight: 400;
	line-height: 1.42857143;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	-ms-touch-action: manipulation;
	touch-action: manipulation;
	cursor: pointer;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	background-image: none;
	border: 1px solid transparent;
	border-radius: 4px;
}

.btn-primary {
	color: #fff !important;
	background: #428bca !important;
	border-color: #357ebd !important;
	box-shadow:none !important;
}
.btn-danger {
	color: #fff !important;
	background: #d9534f !important;
	border-color: #d9534f !important;
	box-shadow:none !important;
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="text-center">Student List</h2>
		</div>

		<div class="row">

			<div class="col-md-12">


				<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Student Id</th>
							<th>Name</th>
							<th>Batch</th>
							<th>Course</th>
							<th>Mobile</th>
							<th>Organization</th>
							<th>Print</th>
						
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th>Student Id</th>
							<th>Name</th>
							<th>Batch</th>
							<th>Course</th>
							<th>Mobile</th>
							<th>Organization</th>
							<th>Print</th>
						
						</tr>
					</tfoot>

					<tbody>
						<tr>
						@foreach ($student as $std)
							<td>{{$std->student_id}}</td>
							<td>{{$std->first_name}} {{$std->last_name}}</td>
							<td>{{$std->batch_id}}</td>
							<td>{{$std->course_id}}</td>
							<td>{{$std->mobile_number}}</td>
							<td>{{$std->organization}}</td>
							<td><p title="Print"><a class="btn btn-primary btn-xs" href="{{ route('admit.print', $std->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></p></td>
						</tr>
						@endforeach
					</tbody>
				</table>


			</div>
		</div>
	</div>

	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input class="form-control " type="text" placeholder="Tiger Nixon">
					</div>
					<div class="form-group">

						<input class="form-control " type="text" placeholder="System Architect">
					</div>
					<div class="form-group">


						<input class="form-control " type="text" placeholder="Edinburgh">

					</div>
				</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
				</div>
			</div>
			<!-- /.modal-content --> 
		</div>
		<!-- /.modal-dialog --> 
	</div>



	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
				</div>
				<div class="modal-body">

					<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

				</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
				</div>
			</div>
			<!-- /.modal-content --> 
		</div>
		<!-- /.modal-dialog --> 
	</div>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>

	<script>
		$(document).ready(function() {
			$('#datatable').dataTable();

			$("[data-toggle=tooltip]").tooltip();

		} );
	</script>
</body>