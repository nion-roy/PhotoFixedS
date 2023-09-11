<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Contact Info</title>
</head>

<body>
	<div>
		@include('layouts.admin_heading')
	</div>

	<div class="mt-5 content">
		<div>
			<a class="btn btn-primary" href="{{ route('addAddress') }}">Add New</a>
		</div>

		<br>

		<div class="m-0">
			@if(Session::has('sess'))
			<p class="alert alert-success" style="font-weight:bold;">{{Session::get('sess')}}</p>
			<br>
			@endif
		</div>

		<div class="m-0 p-3 card shadow">

			<table class="table text-center" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Number</th>
						<th scope="col">Email</th>
						<th scope="col">Address</th>
						<th scope="col">Iframe</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($contacts as $key => $sv)
					<tr>
						<td class="text-break"><b><i>{{ $key + 1 }}</i></b></td>
						<td class="text-break">{{$sv->number}}</td>
						<td class="text-break">{{$sv->email}}</td>
						<td class="text-break">{{$sv->address}}</td>
						<td class="text-break">{{$sv->iframe}}</td>
						<td>
							<a class="m-1 btn btn-secondary" href="{{url('/address-edit/'.$sv->id)}}">Edit</a>
							<a class="m-1 btn btn-danger" href="{{url('/address-delete/'.$sv->id)}}" onclick="return confirm('Delete the address?')">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>

	<script>
		$(document).ready(function(){
            $('#myTable').DataTable();
        });
	</script>
</body>

</html>